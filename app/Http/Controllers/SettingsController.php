<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\Settings;
use Illuminate\Http\Request;
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
        
        return view('settings.index', compact('settings'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Settings::count()){

            return view('settings.create');
        }

        return redirect('/meta/settings');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettnigsRequest $request)
    {
        $input = $this->updateLogoIfNecessary($request);

        Settings::create($input);
        
        return redirect('/meta/settings');
    }

    public function updateLogoIfNecessary(Request $request){
        
        $input = $request->all();
        $file = $request->logo;
        if (!is_null($file) ){
            $name = 'Logo_'.$file->getClientOriginalName();
            $file->move('images', $name);
            $input['logo']=$name;
        }

        return $input;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return redirect('/meta/settings');
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

        return view('settings.edit', compact('settings'));
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingsRequest $request, $id)
    {
        $input = $this->updateLogoIfNecessary($request);
          
        $settings = Settings::firstOrFail();
        $settings->update($input);
        
         return redirect('/meta/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $settings = Settings::firstOrFail();
        
        @unlink(public_path()."/images/".$settings->logo);
        
        $settings->delete();
        
        return redirect('/meta/settings');
    }
}
