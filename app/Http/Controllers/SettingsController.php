<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Auth;
//use App\Models\User;
//use App\Models\Profile;
use Validator;

class SettingsController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $settings ="";
        $msg ="";
        if (Settings::count() == 0){
           $msg = 'No settings';
        }
        else {
        $settings = Settings::firstOrFail();
//        dd($settings);
        }
        
        return view('settings.index', compact('settings','msg'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
//        $id = Auth::user()->id;
//        $user = Profile::find($id);
//     //   dd($user);
              
    //dd($location);   
//        $location = ['google_map' => $user->location,
//        return view('settings.create',  compact($location));
        if (Settings::count() == 0){
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
    public function store(Request $request)
    {
        //

          
       
            $input = $request->all();
            $validator = Validator::make($request->all(),
            [
                'title'                 => 'required|max:255',
                'email'                 => 'required|email|max:255',
                'main_url'              => 'required|max:255',
                'address'               => 'required|max:255',
                'logo'                  => 'required|max:255',
                'meta_image'            => 'max:255',
                'meta_title'            => 'max:255',
                'instagram'             => 'max:255',
                'twitter'               => 'max:255',
                'facebook'              => 'max:255',
                'linkedin'              => 'max:255',
                'ios_app'               => 'max:255',
                'android_app'           => 'max:255',
                'lat'                   => '',
                'lng'                   => '',
                        ],
            [
               
                'title.required'        => trans('settings.titleRequired'),
                'email.required'        => trans('settings.emailRequired'),
                'email.email'           => trans('settings.emailInvalid'),                
                'address.required'      => trans('settings.addressRequired'),
                'main_url.required'     => trans('settings.mainURLRequired'),
                'logo.required'         => trans('settings.logoRequired'),
                'lat'                   => '', //'Latitude required',
                'lng'                   => '', //'Longtitude required',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
// upload logo
 //       dd($request);
            $file = $request->logo;
            if (!is_null($file) ){
                $name = 'Logo_'.$file->getClientOriginalName();
                $file->move('images', $name);
                $input['logo']=$name;
            }
  
//            $input['lat'] = 42.681351; for test
//            $input['lng'] = 23.286031;
         
        Settings::create($input);
        
  //  return $input;
        return redirect('/meta/settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // 
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
        $settings ="";
        $msg ="";
        if (Settings::count() == 0){
           $msg = 'No settings';
        }
        else {
        $settings = Settings::firstOrFail();
//        dd($settings);
        }
//        
//        if (!$settings->google_map){
//            $id = Auth::user()->id;
//            $user = Profile::find($id);
//            $settings['google_map']= $user->location;
////            dd($settings->google_map);
//        }

        return view('settings.edit', compact('settings','msg'));
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
            $input = $request->all();
            $validator = Validator::make($request->all(),
            [
                'title'                 => 'required|max:255',
                'email'                 => 'required|email|max:255',
                'main_url'              => 'required|max:255',
                'address'               => 'required|max:255',
                'logo'                  => 'max:255',
                'meta_image'            => 'max:255',
                'meta_title'            => 'max:255',
                'instagram'             => 'max:255',
                'twitter'               => 'max:255',
                'facebook'              => 'max:255',
                'linkedin'              => 'max:255',
                'ios_app'               => 'max:255',
                'android_app'           => 'max:255',
                'lat'                   => '',
                'lng'                   => '',

            ],
            [
               
                'title.required'        => trans('settings.titleRequired'),
                'email.required'        => trans('settings.emailRequired'),
                'email.email'           => trans('settings.emailInvalid'),                
                'address.required'      => trans('settings.addressRequired'),
                'main_url.required'     => trans('settings.mainURLRequired'),
                'lat'                   => '', //'Latitude required',
                'lng'                   => '', //'Longtitude required',
           ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

            $file = $request->logo;
            if (!is_null($file) ){
                $name = 'Logo_'.$file->getClientOriginalName();
                $file->move('images', $name);
                $input['logo']=$name;
            }
          

        $settings = Settings::firstOrFail();
        $settings->update($input);
        
  //  return $input;
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
    //    dd($settings);
        
        @unlink(public_path()."/images/".$settings->logo);
        
        $settings->delete();
        
        return redirect('/meta/settings');
    }
}
