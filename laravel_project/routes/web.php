<?php

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');

    Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
    Route::post('/folders/create', 'FolderController@create');

    Route::get('/folders/{id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
    Route::post('/folders/{id}/tasks/create', 'TaskController@create');

    Route::get('/folders/{id}/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
    Route::post('/folders/{id}/tasks/{task_id}/edit', 'TaskController@edit');


});
// Route::get('/companies', 'CompanyController@companies_all')->name('companies.index');
// Route::get('/companies/create', 'CompanyController@CompaniesCreate')->name('companies.create');
// Route::post('/companies/createsave', 'CompanyController@CompaniesSave')->name('companies.save');
//
// //http://localhost:8000/companies/28/edit
// Route::get('/companies/{id}/edit', 'CompanyController@CompaniesEdit')->name('companies.edit');
//
// Route::post('/companies/{id}/edit', 'CompanyController@CompaniesEditSave')->name('companies.editsave');
// //
// //
// // Route::get('/terada/{id}', 'TeradaController@edit')->name('tera.edit');
// //
// // Route::post('/terada/save', 'TeradaController@editSave')->name('tera.editSave');
//
// Route::get('/companies/{id}/dalete', 'CompanyController@Companiesdalete')->name('companies.dalete');
// Auth::routes();
Route::group(['middleware' => 'auth'], function() {
Route::get('home', 'HomeController@index')->name('home');


Route::get('/guests', 'GuestsController@Guests_all')->name('guests.index');

Route::get('/guests/create', 'GuestsController@GuestsCreate')->name('guests.create');

Route::post('/guests/createsave', 'GuestsController@GuestsSave')->name('guests.save');

Route::get('/guests/{id}/edit', 'GuestsController@GuestsEdit')->name('guests.edit');

Route::post('/guests/{id}/edit', 'GuestsController@GuestsEditSave')->name('guests.editsave');

Route::get('/guests/{id}/dalete', 'GuestsController@Guestsdalete')->name('guests.dalete');

// /guests/10/delete
// /guests/kubo/delete

Route::get('/chats/{guest_id}', 'ChatsController@chats_all')->name('chats.index');

Route::post('/chats/create', 'ChatsController@ChatsCreate')->name('chats.create');
});
Auth::routes();
