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
use App\FundType;
use App\FundYear;
use App\Events\DraftPr;

class DraftPRCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // ->where('procure_main.L1_office',Auth::user()->office)
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
        ->where('procure_main.void',1)
        ->orderby('procure_main.id','desc')
        ->limit(2000)
        ->get();
        
        return view('admin.prdraft',[
            'data' => $data
        ]);
    }

    public function createPR (Request $req)
    {
        $status = ProcureStatus::all();
        $type = TypeProcure::where('void',1)->orderby('id','asc')->get();
        $office = Office::where('void',1)->orderby('id','asc')->get();
        $category = Category::where('void',1)->orderby('category_id','asc')->get();
        $fundtype = FundType::where('void',1)->orderby('id','asc')->get();
        $year = FundYear::where('void',1)->orderby('id','asc')->get();

        return response()->json([
            'status' => $status,
            'type' => $type,
            'office' => $office,
            'category' => $category,
            'fundtype' => $fundtype,
            'year' => $year
        ]);
    }

    public function addPR (Request $req)
    {
        $match = array(
            'id' => $req->id
        );
       $data = $req->all();
       $data = ProcureMain::updateOrCreate($match,$data);


       if($data->wasRecentlyCreated){
            Session::put('create_pr',true);
        }
        else
        {
            Session::put('update_pr',true);
        }

        return response()->json([
        'data' => $data
        ]);
    }

    static function countItem ($barcode)
    {
       $data = ProcureApp::where('pr_ref',$barcode)->count();

        return $data;
    }

    public function showItem (Request $req)
    {
        // $items = ProcureApp::where('pr_ref',$req->id)->get();

        $items = ProcureApp::select('pr_app.*',
        'fundyear.year',
        'fundyear.id as year_id',
        'office.office',
        'office.id as office_id',
        'category.category',
        'category.category_id as category_id',
        'app.name as title',
        'app.id as app_id ',
        'procure_main.L1_trackno',
        DB::raw("CONCAT(IFNULL(app.item_code, ''),' ', IFNULL(supply.item_desc, '') ) AS name"),
            )
        ->leftJoin('fundyear','pr_app.year','=','fundyear.id')
        ->leftJoin('office','pr_app.office','=','office.id')
        ->leftJoin('procure_main','pr_app.pr_ref','=','procure_main.id')
        ->leftJoin('category','pr_app.category_id','=','category.category_id')
        ->leftJoin('app','pr_app.app_item','=','app.id')
        ->leftJoin('supply','app.supply_id','=','supply.supply_id')
        ->orderby('pr_app.id','desc')
        ->where('pr_app.pr_ref',$req->id)
        ->get();


        $data = ProcureMain::select('procure_main.*','office.office as office','office.id as office_id','procurement_mode.mode as mode','procure_status.status as status',
        'category.category as category','category.category_id as category_id','procure_type.type as procure_type','requested_by.name as req_name','approved_by.name as app_name','cert_by1.name as cert1_name',
        'cert_by2.name as cert2_name', 'fundyear.year as year', 'fundyear.id as year_id')
        ->leftJoin('fundyear','procure_main.L2_fundyear','=','fundyear.id')
        ->leftJoin('office','procure_main.L1_office','=','office.id')
        ->leftJoin('procurement_mode','procure_main.L1_modeproc','=','procurement_mode.id')
        ->leftJoin('procure_status','procure_main.L1_status','=','procure_status.id')
        ->leftJoin('category','procure_main.L1_typeproc','=','category.category_id')
        ->leftJoin('procure_type','procure_main.type_procure','=','procure_type.id')
        ->leftJoin('signatories as requested_by','procure_main.requested_by','=','requested_by.id')
        ->leftJoin('signatories as approved_by','procure_main.approved_by','=','approved_by.id')
        ->leftJoin('signatories as cert_by1','procure_main.cert_by1','=','cert_by1.id')
        ->leftJoin('signatories as cert_by2','procure_main.cert_by2','=','cert_by2.id')
        ->where('procure_main.id',$req->id)
        ->orderby('procure_main.id','desc')
        ->first();

        return response()->json([
            'items' => $items,
            'info' => $data
        ]);
    }

    public function getTitle (Request $req)
    {

        $data = App::select('id','name','supply_id')
            ->where('category_id',$req->category_id)
            ->where('year',$req->year)->get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function getName (Request $req)
    {
        $data = Supply::select('supply_id','item_desc','price')
                ->where('supply_id',$req->supply_id)->first();

        return response()->json([
            'data' => $data
        ]);
    }

    public function addItem(Request $req)
    {
        // dd($req->all());
        $data = array(
            'pr_ref' => $req->pr_ref,
            'office' => $req->office,
            'year' => $req->year,
            'category_id' => $req->category_id,
            'app_item' => $req->app_item,
            'quantity' => $req->quantity,
            'title' => $req->app_item,
            'include_rfq' => 1,
        );
        ProcureApp::Create($data);

        Session::put('add_item_draft',true);

        return response()->json([
            'data' => $data
        ]);
    }

    public function removeDraft(Request $req)
    {
        $data = ProcureMain::find($req->draft_id);

        if($data)
        {
            $data->update([
                'void' => 0
            ]);
        }

        Session::put('remove_pr',true);
        return response()->json([
            'status' => 'updated'
        ]);
    }
}
