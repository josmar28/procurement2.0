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
use PDF;

class PRtrackingCtrl extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $data = array();

        $data = ProcureMain::select('procure_main.*','office.office as office','procurement_mode.mode as mode','procure_status.status as status','category.category as category',
                'procure_type.type as procure_type')
                ->leftJoin('office','procure_main.L1_office','=','office.id')
                ->leftJoin('procurement_mode','procure_main.L1_modeproc','=','procurement_mode.id')
                ->leftJoin('procure_status','procure_main.L1_status','=','procure_status.id')
                ->leftJoin('category','procure_main.L1_typeproc','=','category.category_id')
                ->leftJoin('procure_type','procure_main.type_procure','=','procure_type.id')
                ->where('procure_main.void',1)
                // ->where('procure_main.L1_office',$user->office)
                ->take(5000)
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
        $data = array(
            'type_procure' => $req->type_procure,
            'L1_trackno' => $req->pr_no,
            'L1_office' => $req->L1_office,
            'L1_typeproc' => $req->L1_typeproc,
            'L1_modeproc' => $req->mode,
            'L1_abc' => $req->abc,
            'supplier_inst' => $req->supplier_inst,
            'procurement_description' => $req->pr_description,
            'L1_level' => $req->level,
            'L1_status' => $req->L1_status,
            'date_abstractcanv' => $req->abstract_date,
            'L2_fundsource' => $req->L2_fundsource,
            'L2_fundyear' => $req->L2_fundyear,
            'L2_selectrfqitb' => $req->rfqitb,
            'L2_fundtype' => $req->L2_fundtype,
            'L1_title' => $req->L1_title,
            'L2_rfqitbno' => $req->rfqitb_no,
            'date_delivery' => $req->delivery_date,
            'date_inspection' => $req->inspection_date,
            'supplier1' => $req->supp_1,
            'supplier2' => $req->supp_2,
            'supplier3' => $req->supp_3,
            'override_lowest_supplier' => $req->lowest_supp,
            'date_forwarded_budget' => $req->forwarded_to_budget,
            'date_received_pr' => $req->pr_received,
            'date_forwarded_canvasser' => $req->forwarded_to_canvasser,
            'date_served_supplier' => $req->served_to_supplier,
            'date_canvass_return' => $req->canvass_return,
            'date_forwarded_enduser' => $req->forwarded_to_user,
            'date_forwarded_to_supplier' => $req->forwarded_to_supplier,
            'days_to_be_return' => $req->days_to_be_return,
            'abstract_no' => $req->abstract_no,
            'date_rfq_created' => $req->date_rfq_created,
            'rfq_sig' => $req->signatories,
        );

        $update = ProcureMain::find($req->barcode);

        if($update)
        {
            $update->update($data);
        }
        return response()->json([
            'status' => 'updated'
        ]);
    }

    public function remove (Request $req)
    {
        $data = ProcureMain::find($req->pr_id);

        if($data)
        {
            $data->update([
                'void' => 0
            ]);
        }
        return response()->json([
            'status' => 'updated'
        ]);
    }
    public function prPrint($id)
    {
      $data = ProcureMain::select('procure_main.L1_abc AS abc',
      'procure_main.supplier_inst as supplier_inst',
      'procure_main.L4_amountawarded AS amount_awarded',
      'office.office AS office',
      'procure_main.id AS id',
      'procurement_type.type AS type',
      'account_codes.code AS code',
      'account_codes.name AS name',
      'procurement_mode.mode AS modeproc',
      'procure_main.date_prep_pr_enduser AS date_prep_pr_enduser',
      'procure_level.status AS level',
      'procure_status.status AS status',
      'fundsource.fundsource AS fundsource',
      'procure_main.L1_title AS title',
      'fundyear.year AS year',
      'procure_main.date_rec_procure AS date_received_procure',
      'procure_main.date_noa AS Date NOA',
      'type_internalprocure.type_procure AS internaltype',
       'procure_main.L1_trackno  as prno',
       'signatories.name AS approvedby',
      'signatories.designation AS approveddesig',
      'signatories1.name AS Requestedby',
      'signatories1.designation AS requesteddesig',
      'certby1.name AS cert_by1',
      'certby1.designation AS cert_by1_designation',
      'certby2.name AS cert_by2',
      'certby2.designation AS cert_by2_designation'
      ) 
      ->leftJoin('office','procure_main.L1_office','=','office.id')
      ->leftJoin('procurement_type','procure_main.L1_typeproc','=','procurement_type.id')
      ->leftJoin('procure_level','procure_main.L1_level','=','procure_level.id')
      ->leftJoin('procure_status','procure_main.L1_status','=','procure_status.id')
      ->leftJoin('fundsource','procure_main.L2_fundsource','=','fundsource.id')
      ->leftJoin('fundyear','procure_main.L2_fundyear','=','fundyear.id')
      ->leftJoin('type_internalprocure','procure_main.type_procure','=','type_internalprocure.id')
      ->leftJoin('signatories','procure_main.approved_by','=','signatories.id')
      ->leftJoin('signatories as signatories1','procure_main.requested_by','=','signatories1.id')
      ->leftJoin('signatories as certby1','procure_main.cert_by1','=','certby1.id')
      ->leftJoin('signatories as certby2','procure_main.cert_by2','=','certby2.id')
      ->leftJoin('account_codes','procure_main.L1_accountcode','=','account_codes.id')
      ->leftJoin('procurement_mode','procure_main.L1_modeproc','=','procurement_mode.id')
      ->where('procure_main.id',$id)
      ->get();


      $data2 = DB::table('pr_app_norm')
                ->where('pr_ref',$id)
                ->get();

        $data = [
            'data' => $data,
            'data2' => $data2
        ];
        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE,
            ]
        ]);

        $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->getDomPDF()->setHttpContext($contxt);
        $pdf->loadView('admin.printing.pr_print', $data);
    
        return $pdf->stream('techsolutionstuff.pdf');
    }

}
