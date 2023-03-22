<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\ProcureMain;
use App\ProcureStatus;
use App\TypeProcure;
use Auth;
use App\ProcureApp;
use App\Office;
use App\App;
use App\Supply;
use App\Category;
use App\FundType;
use App\FundYear;
use App\FundSource;
use App\RfqitbSelect;
use App\Signatories;
use App\Suppliers;
use App\ProcureLevel;
use App\ProcureMode;

class PRtrackingCtrl extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user()->id;
        $data = array();

        $data = ProcureMain::select('procure_main.*','office.office as office','procurement_mode.mode as mode','procure_status.status as status','category.category as category',
                'procure_type.type as procure_type')
                ->leftJoin('office','procure_main.L1_office','=','office.id')
                ->leftJoin('procurement_mode','procure_main.L1_modeproc','=','procurement_mode.id')
                ->leftJoin('procure_status','procure_main.L1_status','=','procure_status.id')
                ->leftJoin('category','procure_main.L1_typeproc','=','category.category_id')
                ->leftJoin('procure_type','procure_main.type_procure','=','procure_type.id')
                ->get();


        return view('admin.prtracking',[
            'data' => $data
        ]);
    }

    public function viewTrack (Request $req)
    {
        $status = ProcureStatus::all();
        $type = TypeProcure::where('void',1)->orderby('id','asc')->get();
        $office = Office::where('void',1)->orderby('id','asc')->get();
        $category = Category::where('void',1)->orderby('category_id','asc')->get();
        $fundtype = FundType::where('void',1)->orderby('id','asc')->get();
        $year = FundYear::where('void',1)->orderby('id','asc')->get();
        $fundsource = FundSource::where('void',1)->orderby('id','asc')->get();
        $rfqitb = RfqitbSelect::all();
        $signatories = Signatories::all();
        $suppliers = Suppliers::where('active',1)->orderby('id','asc')->get();
        $level = ProcureLevel::all();
        $mode = ProcureMode::all();

        return response()->json([
            'status' => $status,
            'type' => $type,
            'office' => $office,
            'category' => $category,
            'fundtype' => $fundtype,
            'year' => $year,
            'rfqitb' => $rfqitb,
            'signatories' => $signatories,
            'fundsource' => $fundsource,
            'suppliers' => $suppliers,
            'level' => $level,
            'mode' => $mode
        ]);
    }
    public function updateTrack(Request $req)
    {
        dd($req->all());
    }
}
