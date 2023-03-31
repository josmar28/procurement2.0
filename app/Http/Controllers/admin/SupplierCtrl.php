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
use App\Suppliers;
use App\Category;
use App\FundType;
use App\FundYear;
use App\BusinessCat;

class SupplierCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        // ->where('procure_main.L1_office',Auth::user()->office)
        $data = Suppliers::select('suppliers.*','business_cat.business_cat as business_cat', 'business_cat.business_cat as business_id',
        DB::raw("DATE_FORMAT(suppliers.tc_val,'%M %d, %Y') as tc_val_date"),
        DB::raw("DATE_FORMAT(suppliers.philgeps_val,'%M %d, %Y') as philgeps_val_date"),
        DB::raw("DATE_FORMAT(suppliers.dti_dateissued,'%M %d, %Y') as dti_isssued_date"),
        )
        ->leftJoin('business_cat','suppliers.line_business','=','business_cat.id')
        ->where('suppliers.void',1)
        ->orderby('suppliers.id','desc')
        ->get();

        return view('admin.supplier',[
            'data' => $data
        ]);
    }

    public function getBusiness(Request $req)
    {
        $data = BusinessCat::where('void',1)->get();


        return response()->json([
            'data' => $data
        ]);
    }

    public function addSupplier(Request $req)
    {
        // dd($req->all());

        $match = array(
            'id' => $req->supplier_id
        );

        $data = array(
            'business_name' => $req->business_name,
            'contact' => $req->contact,
            'date_reg' => $req->date_reg,
            'active' => $req->active,
            'tax_clearance' => $req->tax_clearance,
            'tc_val' => $req->tc_val,
            'philgeps' => $req->philgeps,
            'philgeps_val' => $req->philgeps_val,
            'dti' => $req->dti,
            'dti_dateissued' => $req->dti_dateissued,
            'business_permit' => $req->business_permit,
            'bp_val' => $req->bp_val,
            'line_business' => $req->line_business,
            'remarks' => $req->remarks,
            'link' => $req->link,
            'address' => $req->address,
            'tin' => $req->tin,
            'void' => 1,
        );
        
        $data = Suppliers::updateOrCreate($match,$data);

        return response()->json([
            'data' => $data
            ]);

    }

    public function removeSupplier (Request $req)
    {
        $data = Suppliers::find($req->supplier_id);

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
}