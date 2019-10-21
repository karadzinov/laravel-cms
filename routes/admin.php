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
// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep']], function () {

    Route::get('home', 'AdminDetailsController@home')->name('home');

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
      
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('routes', 'AdminDetailsController@listRoutes');
    Route::get('active-users', 'AdminDetailsController@activeUsers');
    
    // settings
    Route::get('meta/settings','SettingsController@index')->name('settings.index');
    Route::get('meta/settings/show','SettingsController@show')->name('settings.show');
    Route::get('meta/settings/edit','SettingsController@edit')->name('settings.edit');
    Route::get('meta/settings/create','SettingsController@create' )->name('settings.create');
    Route::put('meta/settings/update','SettingsController@update' )->name('settings.update');
    
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

Route::group(['prefix'=>'conversations', 'as'=>'conversations.', 'middleware'=>['auth']], function(){
    Route::get('seeParticipants', 'ConversationsController@participants')
        ->middleware(['participates'])->name('seeParticipants');

    Route::post('sendmessage', 'ConversationsController@sendMessage')
        ->middleware(['participates'])->name('sendMessage');

    Route::get('conversationHistory', 'ConversationsController@conversationHistory')
        ->middleware(['participates']);

    Route::get('addConversation', 'ConversationsController@create')->name('create');
    Route::get('storeConversation', 'ConversationsController@store')->name('store');

    Route::get('addNewParticipants', 'ConversationsController@addNewParticipants')->name('addNewParticipants');
    Route::post('storeNewParticipants', 'ConversationsController@storeNewParticipants')
        ->middleware(['participates'])->name('storeNewParticipants');

    Route::get('removeParticipants', 'ConversationsController@removeParticipants')->name('removeParticipants');
    Route::post('deleteParticipants', 'ConversationsController@deleteParticipants')->middleware(['participates'])->name('deleteParticipants');
    
    Route::get('changeName', 'ConversationsController@changeName')->middleware('participates')->name('changeName');
    Route::post('storeNewName', 'ConversationsController@storeNewName')->middleware('participates')->name('storeNewName');

    Route::get('search-conversations-ajax', 'ConversationsController@search');
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

Route::group(["prefix" => "about", "as"=>"about.", 'middleware' => ['auth', 'activated', 'role:admin', 'activity']], function(){
    Route::get('show', 'AboutController@show')->name('show');
    Route::get('create', 'AboutController@create')->name('create');
    Route::post('store', 'AboutController@store')->name('store');
    Route::get('edit', 'AboutController@edit')->name('edit');
    Route::put('update', 'AboutController@update')->name('update');
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

Route::group(["prefix"=>"conversations", "as"=>'conversations.', "middleware"=>['auth', 'activated', 'role:admin', 'activity']], function() {
    Route::delete('delete/{conversation}', 'ConversationsController@delete')->name('delete');
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

Route::group(["prefix" => "faq-categories", "as"=>"faq-categories.", 'middleware' => ['auth', 'activated', 'role:admin', 'activity']], function(){
    Route::get('index', 'FaqCategoriesController@index')->name('index');
    Route::get('show/{category}', 'FaqCategoriesController@show')->name('show');
    Route::get('create', 'FaqCategoriesController@create')->name('create');
    Route::post('store', 'FaqCategoriesController@store')->name('store');
    Route::get('edit/{category}', 'FaqCategoriesController@edit')->name('edit');
    Route::put('update/{category}', 'FaqCategoriesController@update')->name('update');
    Route::delete('delete/{category}', 'FaqCategoriesController@delete')->name('delete');
});

Route::group(["prefix" => "testimonials", "as"=>"testimonials.", 'middleware' => ['auth', 'activated', 'role:admin', 'activity']], function(){
    Route::get('index', 'TestimonialsController@index')->name('index');
    Route::get('show/{testimonial}', 'TestimonialsController@show')->name('show');
    Route::get('create', 'TestimonialsController@create')->name('create');
    Route::post('store', 'TestimonialsController@store')->name('store');
    Route::get('edit/{testimonial}', 'TestimonialsController@edit')->name('edit');
    Route::put('update/{testimonial}', 'TestimonialsController@update')->name('update');
    Route::delete('delete/{testimonial}', 'TestimonialsController@delete')->name('delete');
});

Route::group(["prefix" => "partners", "as"=>"partners.", 'middleware' => ['auth', 'activated', 'role:admin', 'activity']], function(){
    Route::get('index', 'PartnersController@index')->name('index');
    Route::get('show/{partner}', 'PartnersController@show')->name('show');
    Route::get('create', 'PartnersController@create')->name('create');
    Route::post('store', 'PartnersController@store')->name('store');
    Route::get('edit/{partner}', 'PartnersController@edit')->name('edit');
    Route::put('update/{partner}', 'PartnersController@update')->name('update');
    Route::delete('delete/{partner}', 'PartnersController@delete')->name('delete');
});

Route::group(["prefix" => "slides", "as"=>"slides.", 'middleware' => ['auth', 'activated', 'role:admin', 'activity']], function(){
    Route::get('change-order', 'SlidesController@changeOrder')->name('changeOrder');
    Route::post('store-order', 'SlidesController@storeOrder')->name('storeOrder');
    Route::get('index', 'SlidesController@index')->name('index');
    Route::get('show/{slide}', 'SlidesController@show')->name('show');
    Route::get('create', 'SlidesController@create')->name('create');
    Route::post('store', 'SlidesController@store')->name('store');
    Route::get('edit/{slide}', 'SlidesController@edit')->name('edit');
    Route::put('update/{slide}', 'SlidesController@update')->name('update');
    Route::delete('delete/{slide}', 'SlidesController@delete')->name('delete');
});

Route::group(["prefix" => "translations", "as"=>"translations.", 'middleware' => ['auth', 'activated', 'role:admin', 'activity']], function(){
    Route::post('update/{language}/{file}', 'TranslationsController@update')->name('update');
    Route::get('index', 'TranslationsController@index')->name('index');
    Route::get('show/{language}', 'TranslationsController@show')->name('show');
    Route::get('create', 'TranslationsController@create')->name('create');
    Route::post('store', 'TranslationsController@store')->name('store');
    Route::get('edit/{language}/{file}', 'TranslationsController@edit')->name('edit');
    Route::post('addRemoveLanguages', 'TranslationsController@addRemoveLanguages')->name('addRemoveLanguages');
    // Route::delete('delete/{language}', 'TranslationsController@delete')->name('delete');
});