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
    return redirect()->route('login');
});
Auth::routes();

Route::get('logout',function(){
        Auth::logout();
    return redirect('/');
});
Route::get('/home', 'HomeController@index')->name('home');

//PR Tracking
Route::get('procurement/tracking', 'admin\PRtrackingCtrl@index');
Route::get('procurement/view/track', 'admin\PRtrackingCtrl@viewTrack'); 
Route::post('procurement/track/update', 'admin\PRtrackingCtrl@updateTrack');
Route::post('procurement/remove/pr', 'admin\PRtrackingCtrl@remove');

//Draft PR
Route::get('procurement/draft', 'admin\DraftPRCtrl@index');
Route::get('procurement/createpr', 'admin\DraftPRCtrl@createPR');
Route::post('procurement/add', 'admin\DraftPRCtrl@addPR'); 
Route::post('procurement/showitem', 'admin\DraftPRCtrl@showItem');
Route::post('procurement/remove/draft', 'admin\DraftPRCtrl@removeDraft');
//get title per category
Route::post('get/title', 'admin\DraftPRCtrl@getTitle');
//get per name
Route::post('get/name', 'admin\DraftPRCtrl@getName');
//add item
Route::post('procurement/add/item', 'admin\DraftPRCtrl@addItem');

//PPMP 
Route::get('procurement/ppmp', 'admin\PpmpCtrl@index');
Route::get('procurement/addppmp/modal', 'admin\PpmpCtrl@addPpmp'); 
Route::post('get/category', 'admin\PpmpCtrl@getCategory'); 
Route::post('procurement/create/ppmp', 'admin\PpmpCtrl@createPPMP');