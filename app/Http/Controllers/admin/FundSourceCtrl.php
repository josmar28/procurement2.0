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
}
