<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout','HomeController@logout');
Route::get('/settings','HomeController@settings');
Route::post('/post-settings','HomeController@postSettings');
Route::get('/events-table','HomeController@eventsTable');
Route::get('/news-table','HomeController@newsTable');
Route::get('/privileges-table','HomeController@privilegesTable');
Route::get('/foundations-table','HomeController@foundationsTable');
Route::get('/gallery-table','HomeController@galleryTable');


Route::get('/upload-referral','PublicController@uploadReferral');
Route::post('/upload-referral','PublicController@postUploadReferral');


Route::get('/upload-event','HomeController@uploadEvent');
Route::post('/upload-event','HomeController@postUploadEvent');

Route::get('/upload-news','HomeController@uploadNews');
Route::post('/upload-news','HomeController@postUploadNews');

Route::get('/upload-foundation','HomeController@uploadFoundation');
Route::post('/upload-foundation','HomeController@postUploadFoundation');

Route::get('/upload-privilege','HomeController@uploadPrivilege');
Route::post('/upload-privilege','HomeController@postUploadPrivilege');

Route::get('/upload-gallery','HomeController@uploadGallery');
Route::post('/upload-gallery','HomeController@postUploadGallery');


Route::get('/delete-foundation/{fid}','HomeController@deleteFoundation');
Route::get('/delete-gallery/{gid}','HomeController@deleteGallery');
Route::get('/delete-event/{eid}','HomeController@deleteEvent');
Route::get('/delete-news/{nid}','HomeController@deleteNews');
Route::get('/delete-privilege/{nid}','HomeController@deletePrivilege');
