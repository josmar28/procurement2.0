<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProcureMain;
use App\ProcureStatus;
use App\TypeProcure;
use Auth;
use App\ProcureApp;
use App\Office;
use App\App;
use App\Supply;
use App\Category;

class PrAppCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // ->where('procure_main.L1_office',Auth::user()->office)
        $data = ProcureApp::select('pr_app.*',
        'fundyear.year',
        'fundyear.id as year_id',
        'office.office',
        'office.id as office_id',
        'category.category',
        'category.category_id as category_id',
        'app.name as title',
        'app.id as app_id ',
        'procure_main.L1_trackno',
        DB::raw("CONCAT(app.item_code,' ', supply.item_desc) AS name"),
            )
        ->leftJoin('fundyear','pr_app.year','=','fundyear.id')
        ->leftJoin('office','pr_app.office','=','office.id')
        ->leftJoin('procure_main','pr_app.pr_ref','=','procure_main.id')
        ->leftJoin('category','pr_app.category_id','=','category.category_id')
        ->leftJoin('app','pr_app.app_item','=','app.id')
        ->leftJoin('supply','app.supply_id','=','supply.supply_id')
        ->orderby('pr_app.id','desc')
        ->limit(2000)
        ->get();


        
        return view('admin.prapp',[
            'data' => $data
        ]);
    }
}
