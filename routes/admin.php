<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
| All of those routes are prefixed with 'admin/', and their names are prefxed with 'admin.', that you should not add specifically. That is also configuration of RouteServiceProvider, as the controllers that are in Admin folder, also should not be writen in this file.
|
*/
// Route::any('/broadcasting/auth', '\Illuminate\Broadcasting\BroadcastController@authenticate');
// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep']], function () {
    // Route::get('socket', 'SocketController@index');
    // Route::post('sendmessage', 'SocketController@sendMessage');
    // Route::get('writemessage', 'SocketController@writemessage');
    // Route::get('publicChat', 'SocketController@publicChat');
    
    Route::resource('/users/deleted', 'SoftDeletesController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);
    Route::resource('users', 'UsersManagementController', [
        'names' => [
            'index'   => 'users',
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);
    Route::post('search-users', 'UsersManagementController@search')->name('search-users');
    Route::resource('themes', 'ThemesManagementController', [
        'names' => [
            'index'   => 'themes',
            'destroy' => 'themes.destroy',
        ],
    ]);
    
      
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('routes', 'AdminDetailsController@listRoutes');
    Route::get('active-users', 'AdminDetailsController@activeUsers');
    
    // settings
    Route::resource('meta/settings','SettingsController');
    
    Route::get('meta/settings/show','SettingsController@show')->name('settings.show');
    Route::get('meta/settings/1/edit','SettingsController@edit')->name('settings.edit');
    Route::get('meta/settings/create','SettingsController@create' )->name('settings.create');
    Route::put('meta/settings/1/update','SettingsController@update' )->name('settings.update');
    Route::delete('meta/settings/1/destroy','SettingsController@destroy' )->name('settings.delete');
    
    // category
    Route::resource('node/category', 'CategoryController');
    
  
    });
  
Route::redirect('/php', '/phpinfo', 301);
Route::group(["prefix"=>"scripts", "as"=>"scripts.", 'middleware' => ['auth', 'activated', 'role:admin', 'activity']], function(){
    Route::get('index', 'ScriptsController@index')->name('index');
    Route::get('show/{script}', 'ScriptsController@show')->name('show');
    Route::get('create', 'ScriptsController@create')->name('create');
    Route::post('store', 'ScriptsController@store')->name('store');
    Route::get('edit/{script}', 'ScriptsController@edit')->name('edit');
    Route::put('update/{script}', 'ScriptsController@update')->name('update');
    Route::delete('delete/{script}', 'ScriptsController@delete')->name('delete');
});


Route::group(["prefix"=>"pages", "as"=>"pages.", 'middleware' => ['auth', 'activated', 'role:admin', 'activity']], function(){
    Route::get('index', 'PagesController@index')->name('index');
    Route::get('show/{page}', 'PagesController@show')->name('show');
    Route::get('create', 'PagesController@create')->name('create');
    Route::post('store', 'PagesController@store')->name('store');
    Route::get('edit/{page}', 'PagesController@edit')->name('edit');
    Route::put('update/{page}', 'PagesController@update')->name('update');
    Route::delete('delete/{page}', 'PagesController@delete')->name('delete');
});

Route::group(["prefix"=>"images", "as"=>"images.", 'middleware' => ['auth', 'activated', 'role:admin', 'activity']], function(){
    // Route::get('index', 'Images@index')->name('index');
    // Route::get('show/{page}', 'Images@show')->name('show');
    // Route::get('create', 'Images@create')->name('create');
    Route::post('store', 'ImagesController@store')->name('store');
    // Route::get('edit/{page}', 'Images@edit')->name('edit');
    Route::put('update/{image}', 'ImagesController@update')->name('update');
    Route::post('delete', 'ImagesController@delete')->name('delete');
});


Route::group(["prefix"=>"posts", "as"=>"posts.", 'middleware' => ['auth', 'activated', 'role:admin', 'activity']], function() {
    Route::get('index', 'PostsController@index')->name('index');
    Route::get('show/{post}', 'PostsController@show')->name('show');
    Route::get('create', 'PostsController@create')->name('create');
    Route::post('store', 'PostsController@store')->name('store');
    Route::get('edit/{post}', 'PostsController@edit')->name('edit');
    Route::put('update/{post}', 'PostsController@update')->name('update');
    Route::delete('delete/{post}', 'PostsController@delete')->name('delete');
});

Route::group(["prefix"=>"faq", "as"=>"faq.", 'middleware' => ['auth', 'activated', 'role:admin', 'activity']], function(){
    Route::get('index', 'FAQsController@index')->name('index');
    Route::get('show/{faq}', 'FAQsController@show')->name('show');
    Route::get('create', 'FAQsController@create')->name('create');
    Route::post('store', 'FAQsController@store')->name('store');
    Route::get('edit/{faq}', 'FAQsController@edit')->name('edit');
    Route::put('update/{faq}', 'FAQsController@update')->name('update');
    Route::delete('delete/{faq}', 'FAQsController@delete')->name('delete');

});

