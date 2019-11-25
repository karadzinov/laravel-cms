<?php

namespace App\Http\Controllers\Admin;

use Auth;
use File;
use Validator;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\{Country, Currency, Language, Settings, Theme};
use App\Http\Requests\Settings\{StoreSettnigsRequest, UpdateSettingsRequest};

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::first();
        $currency = $settings->currency()->select('name')
                            ->first();
        $theme = Theme::where('active', '=', 1)->first();
        $countries = Country::active()->pluck('name', 'id')->toArray();
        $countries = implode(', ', $countries);

        return view('admin.settings.index', compact('settings', 'countries', 'currency', 'theme'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Settings::count()){

            return view('admin.settings.create');
        }

        return redirect('admin/meta/settings');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettnigsRequest $request)
    {
        $image = $this->updateImageIfNecessary($request);
        $input = $request->all();
        $input['logo'] = $image;

        Settings::create($input);
        
        return redirect('admin/meta/settings')
                ->with('success', trans('settings.success.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return redirect('admin/meta/settings');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = Settings::firstOrFail();
        $languages = Language::pluck('name', 'id');
        $countries = Country::pluck('name', 'id')->toArray();
        $activeCountries = Country::active()->pluck('id')->toArray();

        $currencies = Currency::pluck('name', 'id');
        $currency = $settings->currency()->select('id', 'name')->first();
        $themes = Theme::all();

        return view('admin.settings.edit', compact('settings', 'languages', 'countries', 'activeCountries', 'currencies', 'currency', 'themes'));
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingsRequest $request, $id=1)
    {
        $settings = Settings::firstOrFail();
        $input = $request->all();
        if($difference = $request->get('currency_exchanger')){
            
            $this->updateProductsPrices($difference);
        }

        $currency = $this->updateCurrency($input['currency'], $settings);
        unset($input['currency']);

        $countries = $this->updateCountries($request->get('countries'));
        unset($input['countries']);

        $theme = $this->updateTheme($request->get('theme'));

        $image = $this->updateImageIfNecessary($request, $settings);

        if($image){
            $input['logo'] = $image;
        }
        $settings->update($input);
        $formStatusMessage = ['success'=>trans('settings.success.updated')];

        return redirect('admin/meta/settings')
                ->with($formStatusMessage);
    }

    public function updateCountries($countries){
        if($countries){
            $actives = Country::active()->get();

            $activesArray = $actives->pluck('name', 'id')->toArray();
            $activeIds = $actives->pluck('id')->toArray();
            foreach($countries as $country){
                if(in_array($country, $activeIds)){
                    unset($activesArray[$country]);
                    continue;
                }
                Country::findOrFail($country)->update(['active'=>1]);
            }
            
            if(count($activesArray)){
                foreach($activesArray as $id => $name){
                    $actives->where('id', '=', $id)->first()->update(['active'=>0]);
                }
            }

            return true;
        }

        return false;
        
    }

    public function updateProductsPrices($difference){
        $products = Product::all();

        if($products->isNotEmpty()){
            foreach($products as $product){
                $newPrice = $product->price * $difference;
                $product->price = $newPrice;
                $product->save();
            }
        }

        return true;
    }

    public function updateTheme($theme){
        $theme = Theme::findOrFail($theme);
        $actives = Theme::where('active', '=', 1)->get();
        if(!$actives->contains($theme)){
            foreach($actives as $active){
                $active->update(['active'=>0]);
            }

            $theme->update(['active'=>1]);
        }
        return;
    }

    public function updateAvailableLanguages($languages){
        
        $avalilableLanguages = Language::where('active', '=', '1')->get();

        foreach($avalilableLanguages as $language){
            $language->active = false;
            $language->save();
        }
        $withoutFolder = [];
        foreach($languages as $id){
            $language = Language::findOrFail($id);
            $language->active = true;
            $language->save();
            if(!$language->folder){
                $withoutFolder[] = $language->name;
            }
        }

        return $withoutFolder;
    }

    public function updateCurrency($id, Settings $settings){
        
        if($id != $settings->currency->id){
            $settings->currency_id = $id;
        }

        return;
        
    }
    /**
     * Uploads the logo if there is any, and deletes previous one.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Settings  $settings
     * @return string or null
     */

    public function updateImageIfNecessary(Request $request, Settings $settings=null){
        
        if ($request->hasFile('logo')) {
            if($settings){
               $this->deleteImages($settings);
            }

            $image = $request->file('logo');
            $imageName = 'Logo_'.$request->logo->getClientOriginalName();

            $paths = $this->makePaths();
            File::makeDirectory($paths->original, $mode = 0755, true, true);
            File::makeDirectory($paths->thumbnail, $mode = 0755, true, true);
            File::makeDirectory($paths->medium, $mode = 0755, true, true);

            $image->move($paths->original, $imageName);

            $findimage = $paths->original . $imageName;
            $imagethumb = Image::make($findimage)->resize(125, 80, function ($constraint) {
                $constraint->aspectRatio();
            });

            $imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $imagethumb->save($paths->thumbnail . $imageName);
            $imagemedium->save($paths->medium . $imageName);

            return $imageName;
        }

        return null;
    }

    /**
     * Make paths for storing images.
     *
     * @return object
     */

    public function makePaths(){
        
        $original = public_path() . '/images/settings/originals/';;
        $thumbnail = public_path() . '/images/settings/thumbnails/';
        $medium = public_path() . '/images/settings/medium/';

        $paths = (object) compact('original', 'thumbnail', 'medium');

        return $paths;
    }

    /**
     * Deletes images.
     *
     * @param  Settings  $settings
     * @return bool
     */
    public function deleteImages(Settings $settings){
        $paths = $this->makePaths();
        $logo = $settings->logo;
        try {
            @unlink($paths->original.$logo);
            @unlink($paths->thumbnail.$logo);
            @unlink($paths->medium.$logo);

            return true;
        } catch (Exception $e) {
            
            return false;
        }
    }
}
