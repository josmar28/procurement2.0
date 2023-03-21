<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\ProcureMain;
use Auth;

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
}
