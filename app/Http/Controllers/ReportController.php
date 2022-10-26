<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaskesVaksin;
use App\Models\Faskes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function get_faskes_vaksin(Request $request) {

        $dat = $request->all();
        $is_province=$is_city=0;
        if(isset($dat["province_id"])) {
            $is_province=1;
        }
        
        if(isset($dat["city_id"])) {
            $is_city=1;
        }

        if($is_province==1 && $is_city==0) {
            $FkesVaksin = Faskes::where('faskes.province_id',$dat["province_id"])->get();
        }
        else if($is_province==0 && $is_city==1) {
            $FkesVaksin = Faskes::where('city_id',$dat["city_id"])
                        ->get();
        }
        else if($is_province==1 && $is_city==1) {
            $FkesVaksin = Faskes::where('province_id',$dat["province_id"])
                        ->where('city_id',$dat["city_id"])
                        ->get();
        }
        else {
            $FkesVaksin = Faskes::with("faskeslist")->get();
        }
        // dd($FkesVaksin);
        // exit();
        if(!$FkesVaksin->isEmpty()) {
            return response()->json([
                "statuscode" => 200,
                "message" => "Data Ditemukan",
                "data" => $FkesVaksin 
            ],200);
        }
        else {
            return response()->json([
                "statuscode" => 404,
                "message" => "Vaksin tidak ditemukan"
            ],404);
        }    
    }
}
