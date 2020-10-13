<?php

use Illuminate\Support\Facades\Route;

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

// viets ntn de no nhan router -dom cua react, ko thif no se tim theo router khai bao laravel va se tra ve 404
//Route::pattern('path', '[a-zA-Z0-9-/]+');
// Route::any( '{path}', function( $page ){
//    return view('welcome');
// });
// Route::view('/{path?}', 'welcome');
//Backend


Route::get('/admin', 'AdminController@index' );
//Route::get('/dashboard', 'AdminController@showDashboard');


Route::group(['prefix'=>'/admin'], function(){
    Route::get('/dashboard', ['as'=>'admin.dashboard', 'uses'=>'AdminController@showDashboard']);
    Route::post('/login', 'AdminController@dashboard');
    Route::get('/logout', 'AdminController@logOut');

    // Category
    Route::get('/add-category', ['as'=>'admin.add.category', 'uses'=>'Adminhtml\CategoryController@addCategory']);
    Route::get('/list-category', ['as'=>'admin.list.category', 'uses'=>'Adminhtml\CategoryController@listCaterogy']);
    Route::post('/save-category-product', ['as'=>'admin.save.category', 'uses'=>'Adminhtml\CategoryController@saveCaterogy']);
    Route::get('/delete-category/{id}', ['as'=>'admin.delete.category', 'uses'=>'Adminhtml\CategoryController@deleteCaterogy']);
    Route::get('/edit-category/{id}', ['as'=>'admin.edit.category', 'uses'=>'Adminhtml\CategoryController@editCaterogy']);
    Route::get('/diable-category/{id}', ['as'=>'admin.diable.category', 'uses'=>'Adminhtml\CategoryController@disableCaterogy']);
    Route::get('/enable-category/{id}', ['as'=>'admin.enable.category', 'uses'=>'Adminhtml\CategoryController@enableCaterogy']);
    Route::post('/post-edit-category-product/{id}', ['as'=>'admin.postedit.category', 'uses'=>'Adminhtml\CategoryController@postEditCaterogy']);

    // Brand Product
    Route::get('/add-brand-product', ['as'=>'admin.add.brand.product', 'uses'=>'Adminhtml\ProductController@addBrandProduct']);
    Route::get('/list-brand-product', ['as'=>'admin.list.brand.product', 'uses'=>'Adminhtml\ProductController@listBrandProduct']);
    Route::post('/save-brand-product', ['as'=>'admin.save.brand.product', 'uses'=>'Adminhtml\ProductController@saveBrandProduct']);
    Route::get('/delete-brand-product/{id}', ['as'=>'admin.delete.brand.product', 'uses'=>'Adminhtml\ProductController@deleteBrandProduct']);
    Route::get('/edit-brand-product/{id}', ['as'=>'admin.edit.brand.product', 'uses'=>'Adminhtml\ProductController@editBrandProduct']);
    Route::get('/diable-brand-product/{id}', ['as'=>'admin.diable.brand.product', 'uses'=>'Adminhtml\ProductController@disableBrandProduct']);
    Route::get('/enable-brand-product/{id}', ['as'=>'admin.enable.brand.product', 'uses'=>'Adminhtml\ProductController@enableBrandProduct']);
    Route::post('/post-edit-brand-product/{id}', ['as'=>'admin.postedit.brand.product', 'uses'=>'Adminhtml\ProductController@postEditBrandProduct']);
});
