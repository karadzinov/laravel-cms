<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;


use Analytics;
use Spatie\Analytics\Period;



class AdminDetailsController extends Controller
{

    public function home(){
        $data = [];
        if(env('ANALYTICS_VIEW_ID')){
            
            $totalVisitors = Analytics::fetchTotalVisitorsAndPageViews(Period::months(1));
            $mostVisitedPages =  Analytics::fetchMostVisitedPages(Period::months(1), 10);
            $referrs = Analytics::fetchTopReferrers(Period::years(1));
            $userTypes = Analytics::fetchUserTypes(Period::years(1));
            $devices = $this->getDevices();
            $browsers = Analytics::fetchTopBrowsers(Period::years(1));
            $visitsPerCountry = $this->getVisitsPerCountry();
            
            $data = compact('totalVisitors', 'mostVisitedPages', 'referrs', 'userTypes', 'devices', 'browsers', 'visitsPerCountry');
        }

        return view('admin/home', $data);
        
    }

    public function getDevices(){
        $devices = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:deviceCategory'
            ]
        );

        return $devices->rows;
    }

    public function getVisitsPerCountry(){
        
        $visitsPerCountry = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                // 'metrics' => 'ga:sessions',
                'dimensions' => 'ga:country'
            ]
        );
        return $visitsPerCountry->rows;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listRoutes()
    {
        $routes = Route::getRoutes();
        $data = [
            'routes' => $routes,
        ];

        return view('admin/route-details', $data);
    }

    /**
     * Display active users page.
     *
     * @return \Illuminate\Http\Response
     */
    public function activeUsers()
    {
        $users = User::count();

        return view('admin/active-users', ['users' => $users]);
    }
}
