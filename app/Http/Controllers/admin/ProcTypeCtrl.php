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
use App\ProcureType;

class ProcTypeCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // ->where('procure_main.L1_office',Auth::user()->office)
        $data = ProcureType::where('void',1)
        ->orderby('id','desc')
        ->get();
        
        return view('admin.proctype',[
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
            'type' => $req->type,
        );

        $data = ProcureType::updateOrCreate($match,$data);

        if($data->wasRecentlyCreated){
            Session::put('pr_type_add',true);
        }
        else
        {
            Session::put('pr_type_update',true);
        }

        return response()->json([
            'data' => $data
            ]);
    }

    public function remove (Request $req)
    {
        $data = ProcureType::where('id',$req->id);

        if($data)
        {
            $data->update([
                'void' => 0
            ]);

            Session::put('pr_type_remove',true);
        }

        else{
            Session::put('pr_type_remove_no',true);
        }
      

        return response()->json([
            'status' => 'updated'
        ]);
    }
}
