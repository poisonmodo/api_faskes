<?php

namespace App\Http\Controllers;

use App\Models\Vaksins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VaksinController extends Controller
{
    //
    public function create(Request $request)
    {
        //
        $dat = $request->all();
         $validator = Validator::make($request->all(), [
            'vaksin' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                "statuscode" => 422,
                "message" => $validator->errors()
            ],422);
        } 
        
        $vaksin = new Vaksins;
        $vaksin->vaksin_name=$dat["vaksin"];
        $vaksin->save();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "Vaksin berhasil ditambahkan"
        ],200);
    }

    public function edit(Request $request,$id) {
        $dat = $request->all();
         $validator = Validator::make($request->all(), [
            'vaksin' => 'required|string',            
        ]);

        if($validator->fails()){
            return response()->json([
                "statuscode" => 422,
                "message" => $validator->errors()
            ],422);
        } 
        
        $vaksin = Vaksins::find($id);
        $vaksin->vaksin_name=$dat["vaksin"];
        $vaksin->save();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "Vaksin berhasil diupdate"
        ],200);
    }

    public function delete(Request $request,$id) {
        $dat = $request->all();
        //  $validator = Validator::make($request->all(), [
        //     'id' => 'required',
        // ]);

        // if($validator->fails()){
        //     return response()->json([
        //         "success" => false,
        //         "message" => $validator->errors()
        //     ],422);
        // } 
        
        $vaksin = Vaksins::find($id);
        $vaksin->delete();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "Vaksin berhasil dihapus"
        ],200);
    }

    public function get_vaksins(Request $request) {
        $dat = $request->all();
        $vaksin = Vaksins::all();
        if(!$vaksin->isEmpty()) {
            return response()->json([
                "statuscode" => 200,
                "message" => "Data Ditemukan",
                "data" => $vaksin 
            ],200);
        }
        else {
            return response()->json([
                "statuscode" => 404,
                "message" => "Vaksin tidak ditemukan"
            ],404);
        }    
    }

    public function get_vaksin_detail(Request $request,$id) {
        $dat = $request->all();
        $vaksin = Vaksins::find($id);
        if(!empty($vaksin)) {
            return response()->json([
                "statuscode" => 200,
                "message" => "Vaksin ditemukan",
                "data" =>$vaksin
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
