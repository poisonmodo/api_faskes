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
        $FkesVaksin = FaskesVaksin::with("faskeslist")->with("vaksinlist")->get();
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
