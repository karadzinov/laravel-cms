<?php
use App\Helpers\TwoCheckout\Twocheckout;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Middleware options can be located in `app/Http/Kernel.php`
|
*/
Route::get('/changeTheme', function(){
    try {
       $active = App\Models\Theme::where('active', '=', 1)->first();
       $newActive = App\Models\Theme::where('id', '!=', $active->id)->first();
       $newActive->active = 1;
       $newActive->save();
       $active->active = 0;
       $active->save();

       return redirect()->back(); 
    } catch (\Exception $e) {
        dd($e);
    }
});

Route::get('test', function(){
    //https://github.com/2checkout/2checkout-php
dd(Twocheckout::privateKey('sandbox-private-key') )  ;
});

Route::get('/test-charge', 'PaymentController@test');
Route::post('/charge', 'PaymentController@charge')->name('charge');

// Homepage Route
Route::get('/', 'WelcomeController@welcome')->name('welcome');

//Rss Feed Routes
Route::get('feed', 'RssFeedController@index')->name('feed');

// Authentication Routes
Auth::routes();

// Public Routes
Route::group(['middleware' => ['web', 'activity']], function () {
    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);
    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'Auth\ActivateController@exceeded']);
    // Socialite Register Routes
    Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
    Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'Auth\SocialController@getSocialHandle']);
    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity']], function () {
    // Activation Routes
    Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
    Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'twostep']], function () {
    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/home', ['as' => 'public.home',   'uses' => 'UserController@index']);
    // Show users profile - viewable by other users.
    Route::get('profile/{username}', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@show',
    ]);
});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep']], function () {
    // User Profile and Account Routes
    Route::resource(
        'profile',
        'ProfilesController', [
            'only' => [
                'show',
                'edit',
                'update',
                'create',
            ],
        ]
    );
    Route::put('profile/{username}/updateUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@deleteUserAccount',
    ]);
    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'ProfilesController@userProfileAvatar',
    ]);
    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);
});

Route::get('search-ajax', 'SearchController@searchAjax')->name('search-ajax');
Route::get('search', 'SearchController@search')->name('search');

//email sender
Route::post('faq-email', 'EmailController@faqEmail')->name('faqEmail');
Route::post('contact-page-email', 'EmailController@contactPageEmail')->name('contactEmail');
//FrontEndController actions
Route::group(['as'=>'faq.'], function(){
    Route::get('/faqs', 'FrontEndController@faqs')->name('index');
});

Route::get('tags/{slug}', "FrontEndController@tagPosts")->name('tagPosts');

Route::group(['as'=>'posts.'], function(){
    Route::get('/posts', 'FrontEndController@posts')->name('index');
    Route::get('/{categorySlug}/{slug}', 'FrontEndController@postsShow')->name('show');
});

Route::get('contact', 'FrontEndController@contact')->name('contact');
Route::get('about', 'FrontEndController@about')->name('about');

Route::post('switch-language', 'FrontEndController@switchLanguage')->name('switchLanguage');

Route::group(['as'=>'pages.'], function(){
    Route::get('/pages', 'FrontEndController@pages')->name('index');
});

//pages and categories
Route::get('/{slug}', 'FrontEndController@categoriesAndPages')->name('categories.pages.show');