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
Route::get('procurement/print/pr/{id}', 'admin\PRtrackingCtrl@prPrint');
Route::get('procurement/print/rfq/{id}', 'admin\PRtrackingCtrl@rfqPrint');
Route::get('procurement/print/aq/{id}', 'admin\PRtrackingCtrl@aqPrint');
Route::get('procurement/print/bac_res/{id}', 'admin\PRtrackingCtrl@bacresPrint');

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
Route::post('procurement/remove/ppmp', 'admin\PpmpCtrl@removePPMP');

//Supplies
Route::get('procurement/supplies', 'admin\SuppliesCtrl@index'); 
Route::get('get/supp_category', 'admin\SuppliesCtrl@getCategory'); 
Route::post('procurement/create/supply', 'admin\SuppliesCtrl@createSupply'); 
Route::post('procurement/remove/supply', 'admin\SuppliesCtrl@removeSupply');

//Suppliers 
Route::get('procurement/supplier', 'admin\SupplierCtrl@index');
Route::get('get/business', 'admin\SupplierCtrl@getBusiness');
Route::post('procurement/supplier/create', 'admin\SupplierCtrl@addSupplier'); 
Route::post('procurement/remove/supplier', 'admin\SupplierCtrl@removeSupplier');

//Fund Source
Route::post('procurement/fundsource/remove', 'admin\FundSourceCtrl@remove');
Route::post('procurement/fundsource/add', 'admin\FundSourceCtrl@add');
Route::get('procurement/fundsource', 'admin\FundSourceCtrl@index');
Route::get('get/year', 'admin\FundSourceCtrl@getYear');


//Fund Type
Route::get('procurement/fundtype', 'admin\FundTypeCtrl@index'); 
Route::post('procurement/fundtype/add', 'admin\FundTypeCtrl@add'); 
Route::post('procurement/fundtype/remove', 'admin\FundTypeCtrl@remove');


//Fund Year 
Route::get('procurement/fundyear', 'admin\FundYearCtrl@index');
Route::post('procurement/fundyear/add', 'admin\FundYearCtrl@add');  
Route::post('procurement/fundyear/remove', 'admin\FundYearCtrl@remove');

//Expense Code 
Route::get('procurement/expense/code', 'admin\ExpenseCodeCtrl@index'); 
Route::post('procurement/expensecode/add', 'admin\ExpenseCodeCtrl@add');   
Route::post('procurement/expensecode/remove', 'admin\ExpenseCodeCtrl@remove');

//Procument Type
Route::get('procurement/type', 'admin\ProcTypeCtrl@index'); 
Route::post('procurement/procuretype/add', 'admin\ProcTypeCtrl@add');   
Route::post('procurement/procuretype/remove', 'admin\ProcTypeCtrl@remove');

//Procurement Type Internal
Route::get('procurement/type/internal', 'admin\ProcTypeInterCtrl@index'); 
Route::post('procurement/typeinternal/add', 'admin\ProcTypeInterCtrl@add');   
Route::post('procurement/typeinternal/remove', 'admin\ProcTypeInterCtrl@remove');

//Procurement Mode
Route::get('procurement/mode', 'admin\ProcModeCtrl@index');

//RFQ ITB 
Route::get('procurement/rfq/itb', 'admin\RfqItbCtrl@index');

//Status Level 
Route::get('procurement/status/level', 'admin\StatusLevelCtrl@index');

//Status procurement/status
Route::get('procurement/status', 'admin\StatusCtrl@index');

//Document type 
Route::get('procurement/document/type', 'admin\DocTypeCtrl@index');

//Category 
Route::get('procurement/category', 'admin\CategoryCtrl@index');


//Signatories 
Route::get('procurement/signatories', 'admin\SignatoriesCtrl@index');

//Offices   
Route::get('procurement/offices', 'admin\OfficeCtrl@index');

//Business Category
Route::get('procurement/business/category', 'admin\BusiCatCtrl@index'); 

//PR App 
Route::get('procurement/pr/app', 'admin\PrAppCtrl@index'); 