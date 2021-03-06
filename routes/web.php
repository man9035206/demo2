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

Route::get('/home', 'HomeController@index');
route::get('allblogs','BlogController@index');
route::get('createBlog','BlogController@create');
route::post('/store','BlogController@store');
route::get('edit/{slug}','BlogController@edit');

route::post('update/{id}','BlogController@update');
Route::DELETE('/blog/delete/{id}', 'BlogController@destroy');

Route::get('/singleBlog/{slug}', 'BlogController@singleBlog');

route::get('addElements','BlogController@addelemnt');
route::post('storeOptions','BlogController@storeoptions');

route::get('to','TodoController@index');
route::post('to','TodoController@store');
route::post('delete','TodoController@del');
route::post('editItem','TodoController@update');
route::post('trashItem','TodoController@trash');

Route::get('add-contact','ContactController@create');
route::get('all-contacts',[
    'uses' => 'ContactController@index',
    'as' => 'contacts.index'
]);
route::post('store_contacts',[
    'uses' => 'ContactController@store',
    'as' => 'contacts.store'
]);
route::post('store_groups',[
    'uses' => 'ContactController@storeGroup',
    'as' => 'groups.store'
]);


Route::get('/ajax_crud','CrudController@index');
Route::get('/ajax_dropdown','CategoryController@index');
Route::get('/sub_cat','CategoryController@getSubcategory');


route::post('/addItem','CrudController@store');
