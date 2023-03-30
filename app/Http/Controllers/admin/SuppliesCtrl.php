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

class SuppliesCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        // ->where('procure_main.L1_office',Auth::user()->office)
        $data = Supply::select('supply.*','category.category as category','category.category_id as category_id',)
        ->leftJoin('category','supply.category_id','=','category.category_id')
        ->where('supply.void',1)
        ->orderby('supply.supply_id','desc')
        ->take(2500)
        ->get();

        return view('admin.supplies',[
            'data' => $data
        ]);
    }

    public function getCategory()
    {
        $cat = Category::where('void',1)->orderby('category_id','asc')->get();

        return response()->json([
            'cat' => $cat
        ]);
    }

    public function createSupply(Request $req)
    {
        // dd($req->all());

        $match = array(
            'supply_id' => $req->ppmp_id
        );

        $data = array(
            'category_id' => $req->category,
            'item' => $req->item,
            'item_desc' => $req->item_desc,
            'price' => $req->price,
            'unit' => $req->unit,
            'status' => $req->status,
            'void' => 1,
        );
        
        $data = Supply::updateOrCreate($match,$data);

        return response()->json([
            'data' => $data
            ]);
    }

    public function removeSupply (Request $req)
    {
        $data = Supply::where('supply_id',$req->supply_id);

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