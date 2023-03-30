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

class PpmpCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        // ->where('procure_main.L1_office',Auth::user()->office)
        $data = App::select('app.*','office.office as office','office.id as office_id','category.category as category','fundyear.year','supply.unit as supply_unit',
        'supply.price as supply_price','supply.item_desc','supply.item as supply_item','fundyear.id as year_id',)
        ->leftJoin('office','app.office','=','office.id')
        ->leftJoin('category','app.category_id','=','category.category_id')
        ->leftJoin('fundyear','app.year','=','fundyear.id')
        ->leftJoin('supply','app.supply_id','=','supply.supply_id')
        ->where('app.office',$user->office)
        ->get();

        return view('admin.ppmp',[
            'data' => $data
        ]);
    }

    public function addPpmp(Request $req) 
    {
        $year = FundYear::where('void',1)->orderby('id','desc')->get();
        $category = Category::where('void',1)->orderby('category_id','asc')->get();
        $office = Office::where('void',1)->orderby('id','asc')->get();
        
    return response()->json([
            'year' => $year,
            'category' => $category,
            'office' => $office
        ]);
    }

    public function getCategory(Request $req)
    {
        $date = date("Y");
        $cat = Supply::where('category_id',$req->cat_id)->orderby('category_id','asc')->get();

        return response()->json([
            'cat' => $cat
        ]);
    }

    public function createPPMP(Request $req)
    {

        // dd($req->all());

        $match = array(
            'id' => $req->ppmp_id
        );

        $total = $req->jan + $req->feb + $req->march + $req->april + $req->may + $req->june + $req->july + $req->aug + $req->sept + $req->oct + $req->nov + $req->dec;

        $estimated_budget = $req->price * $total;

        $data = array(
            'office' => $req->office,
            'year' => $req->year,
            'category_id' => $req->category,
            'supply_id' => $req->item,
            'item_code' => $req->item_code,
            'name' => $req->title,
            'jan' => $req->jan ? $req->jan : '0.00',
            'feb' => $req->feb ? $req->feb : '0.00',
            'march' => $req->march ? $req->march : '0.00',
            'april' => $req->april ? $req->april : '0.00',
            'may' => $req->may ? $req->may : '0.00',
            'june' => $req->june ? $req->june : '0.00',
            'july' => $req->july ? $req->july : '0.00',
            'august' => $req->august ? $req->august : '0.00',
            'september' => $req->september ? $req->september : '0.00',
            'october' => $req->october ? $req->october : '0.00',
            'november' => $req->november ? $req->november : '0.00',
            'december' => $req->december ? $req->december : '0.00',
            'unit_view' => $req->item,
            'price_view' => $req->item,
            'estimated_budget' => $estimated_budget,
        );
        
        $data = App::updateOrCreate($match,$data);

        return response()->json([
            'data' => $data
            ]);
    }

    public function removePPMP(Request $req)
    {
        $data = App::find($req->ppmp_id);

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