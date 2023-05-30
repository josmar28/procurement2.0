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
use App\FundSource;

class FundSourceCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // ->where('procure_main.L1_office',Auth::user()->office)
        $data = FundSource::select('fundsource.*','fundyear.year as year','fundyear.id as year_id')
        ->leftJoin('fundyear','fundsource.year','=','fundyear.id')
        ->where('fundsource.void',1)
        ->orderby('fundsource.id','desc')
        ->get();
        
        return view('admin.fundsource',[
            'data' => $data
        ]);
    }

    
    public function getYear(Request $req)
    {
        $year = FundYear::where('void',1)->orderby('id','desc')->get();

        
        return response()->json([
            'year' => $year
            ]);
    }

    public function add(Request $req)
    {
        // dd($req->all());

        $match = array(
            'id' => $req->id
        );

        $data = array(
            'year' => $req->year,
            'fundsource' => $req->fundsource,
            'amount' => $req->amount,
        );

        $data = FundSource::updateOrCreate($match,$data);

        if($data->wasRecentlyCreated){
            Session::put('source_add',true);
        }
        else
        {
            Session::put('source_update',true);
        }

        return response()->json([
            'data' => $data
            ]);
    }

    public function remove (Request $req)
    {
        $data = FundSource::where('id',$req->id);

        if($data)
        {
            $data->update([
                'void' => 0
            ]);
        }
        Session::put('remove_source',true);

        return response()->json([
            'status' => 'updated'
        ]);
    }
}
