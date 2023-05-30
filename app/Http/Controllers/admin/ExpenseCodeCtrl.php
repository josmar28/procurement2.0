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
use App\AccountCodes;
use App\FundType;
use App\FundYear; 
use App\FundSource;

class ExpenseCodeCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // ->where('procure_main.L1_office',Auth::user()->office)
        $data = AccountCodes::where('void',1)
        ->orderby('id','desc')
        ->get();
        
        return view('admin.exponsecode',[
            'data' => $data
        ]);
    }

    public function add (Request $req)
    {
        // dd($req->all());

        $match = array(
            'id' => $req->id
        );

        $data = array(
            'code' => $req->code,
            'name' => $req->name,
        );

        $data = AccountCodes::updateOrCreate($match,$data);

        if($data->wasRecentlyCreated){
            Session::put('expense_add',true);
        }
        else
        {
            Session::put('expense_update',true);
        }

        return response()->json([
            'data' => $data
            ]);
    }

    public function remove (Request $req)
    {
        $data = AccountCodes::where('id',$req->id);

        if($data)
        {
            $data->update([
                'void' => 0
            ]);
        }
        Session::put('expense_remove',true);

        return response()->json([
            'status' => 'updated'
        ]);
    }
}
