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
use App\Office;
use App\Category;
use App\FundType;

class DraftPRCtrl extends Controller
{
    public function index()
    {
        $data = ProcureMain::select('procure_main.*','office.office as office','procurement_mode.mode as mode','procure_status.status as status','category.category as category',
        'procure_type.type as procure_type','requested_by.name as req_name','approved_by.name as app_name','cert_by1.name as cert1_name','cert_by2.name as cert2_name')
        ->leftJoin('office','procure_main.L1_office','=','office.id')
        ->leftJoin('procurement_mode','procure_main.L1_modeproc','=','procurement_mode.id')
        ->leftJoin('procure_status','procure_main.L1_status','=','procure_status.id')
        ->leftJoin('category','procure_main.L1_typeproc','=','category.category_id')
        ->leftJoin('procure_type','procure_main.type_procure','=','procure_type.id')
        ->leftJoin('signatories as requested_by','procure_main.requested_by','=','requested_by.id')
        ->leftJoin('signatories as approved_by','procure_main.approved_by','=','approved_by.id')
        ->leftJoin('signatories as cert_by1','procure_main.cert_by1','=','cert_by1.id')
        ->leftJoin('signatories as cert_by2','procure_main.cert_by2','=','cert_by2.id')
        ->where('procure_main.L1_status','3')
        ->get();


        return view('admin.prdraft',[
            'data' => $data
        ]);


    }

    public function createPR (Request $req)
    {
        $status = ProcureStatus::where('status','DRAFT')->get();
        $type = TypeProcure::where('void',1)->orderby('id','asc')->get();
        $office = Office::where('void',1)->orderby('id','asc')->get();
        $category = Category::where('void',1)->orderby('category_id','asc')->get();
        $fundtype = FundType::where('void',1)->orderby('id','asc')->get();

        return view('admin.createpr_body',[
            'status' => $status,
            'type' => $type,
            'office' => $office,
            'category' => $category,
            'fundtype' => $fundtype
        ]);
    }
}
