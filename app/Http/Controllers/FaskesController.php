<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaskesVaksin;
use App\Models\Faskes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class FaskesController extends Controller
{
    public function get_faskesvaksin_detail(Request $request,$id) {
        $dat = $request->all();
        $FkesVaksin = FaskesVaksin::with('faskeslist')->with('vaksinlist')->where('id',$id)->get();
        if(!empty($FkesVaksin)) {
            return response()->json([
                "statuscode" => 200,
                "message" => "Vaksin ditemukan",
                "data" =>$FkesVaksin
            ],200);
        }
        else {
            return response()->json([
                "success" => false,
                "message" => "Vaksin tidak ditemukan"
            ],404);
        }    
    }

    public function delete_faskes_vaksin(Request $request,$id) {
        $dat = $request->all();
        //  $validator = Validator::make($request->all(), [
        //     'id' => 'required',
        // ]);

        if(!$id) {
            return response()->json([
                "success" => false,
                "message" => "Silakan masukkan id"
            ],422);
        } 
        
        $FkesVaksin = FaskesVaksin::find($id);
        $FkesVaksin->delete();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "Vaksin berhasil dihapus"
        ],200);
    }

    public function edit_faskes_vaksin(Request $request,$id) {
        $dat = $request->all();
         $validator = Validator::make($request->all(), [
            'faskes_id'       => 'required|integer',
            'vaksin_id'       => 'required|integer',
            'kouta'           => 'required|integer',
                        
        ]);

        if($validator->fails()){
            return response()->json([
                "statuscode" => 422,
                "message" => $validator->errors()
            ],422);
        } 
        
        $FkesVaksin = FaskesVaksin::find($id);
        $FkesVaksin->faskes_id=$dat["faskes_id"];
        $FkesVaksin->vaksin_id=$dat["vaksin_id"];
        $FkesVaksin->kouta=$dat["kouta"];
        // $FkesVaksin->updated_at=date("Y-m-d H:i:s");
        $FkesVaksin->save();
       
        return response()->json([   
            "statuscode" => 200,
            "message" => "Vaksin berhasil diupdate"
        ],200);
    }


    //
    public function add_faskes_vaksin(Request $request)
    {
        //
        $dat = $request->all();
        $faskes_id = $dat['faskes_id']; 
        $validator = Validator::make($dat, [
            'faskes_id'       => 'required|integer',
            'vaksin_id'       => 'required|integer|exists:faskes_vaksins,faskes_id',
            'kouta'           => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json([
                "statuscode" => 422,
                "message" => $validator->errors()
            ],422);
        } 
        
        $FkesVaksin = new FaskesVaksin;
        $FkesVaksin->faskes_id=$dat["faskes_id"];
        $FkesVaksin->vaksin_id=$dat["vaksin_id"];
        $FkesVaksin->kouta=$dat["kouta"];
        // $FkesVaksin->created_at=date("Y-m-d H:i:s");
        // $FkesVaksin->updated_at=date("Y-m-d H:i:s");
        $FkesVaksin->save();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "Vaksin berhasil ditambahkan"
        ],200);
    }

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $dat = $request->all();
        $validator = Validator::make($request->all(), [
            'faskes_type'       => 'required|integer',
            'faskes_name'       => 'required|string',
            'faskes_address'    => 'required|string',
            'faskes_phone'      => 'required|string',
            'city_id'           => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json([
                "statuscode" => 422,
                "message" => $validator->errors()
            ],422);
        } 
        
        $Fkes = new Faskes;
        $Fkes->faskes_type=$dat["faskes_type"];
        $Fkes->faskes_name=$dat["faskes_name"];
        $Fkes->faskes_address=$dat["faskes_address"];
        $Fkes->faskes_phone=$dat["faskes_phone"];
        $Fkes->city_id=$dat["city_id"];
        $Fkes->save();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "Faskes berhasil ditambahkan"
        ],200);
    }

    public function edit(Request $request,$id) {
        $dat = $request->all();
         $validator = Validator::make($request->all(), [
            'faskes_type'       => 'required|integer',
            'faskes_name'       => 'required|string',
            'faskes_address'    => 'required|string',
            'faskes_phone'      => 'required|string',
            'city_id'           => 'required|integer',            
        ]);

        if($validator->fails()){
            return response()->json([
                "statuscode" => 422,
                "message" => $validator->errors()
            ],422);
        } 
        
        $Fkes = Faskes::find($id);
        $Fkes->faskes_type=$dat["faskes_type"];
        $Fkes->faskes_name=$dat["faskes_name"];
        $Fkes->faskes_address=$dat["faskes_address"];
        $Fkes->faskes_phone=$dat["faskes_phone"];
        $Fkes->city_id=$dat["city_id"];
        $Fkes->save();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "Faskes berhasil diupdate"
        ],200);
    }

    public function delete(Request $request,$id) {
        $dat = $request->all();
        //  $validator = Validator::make($request->all(), [
        //     'id' => 'required',
        // ]);

        if(!$id) {
            return response()->json([
                "success" => false,
                "message" => "Silakan masukkan id"
            ],422);
        } 
        
        $Fkes = Faskes::find($id);
        $Fkes->delete();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "Faskes berhasil dihapus"
        ],200);
    }

    public function get_faskes(Request $request) {
        $dat = $request->all();
        $Fkes = Faskes::all();
        if(!$Fkes->isEmpty()) {
            return response()->json([
                "statuscode" => 200,
                "message" => "Data Ditemukan",
                "data" => $Fkes 
            ],200);
        }
        else {
            return response()->json([
                "statuscode" => 404,
                "message" => "Faskes tidak ditemukan"
            ],404);
        }    
    }

    public function get_faskes_detail(Request $request,$id) {
        $dat = $request->all();
        $Fkes = Faskes::find($id);
        if(!empty($Fkes)) {
            return response()->json([
                "statuscode" => 200,
                "message" => "Faskes ditemukan",
                "data" =>$Fkes
            ],200);
        }
        else {
            return response()->json([
                "success" => false,
                "message" => "Faskes tidak ditemukan"
            ],404);
        }    
    }
}
