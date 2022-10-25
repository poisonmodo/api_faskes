<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinces;
use Illuminate\Support\Facades\Validator;

class ProvinceController extends Controller
{
    //
    public function create(Request $request)
    {
        //
        $dat = $request->all();
         $validator = Validator::make($request->all(), [
            'province' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                "statuscode" => 422,
                "message" => $validator->errors()
            ],422);
        } 
        
        $province = new Provinces;
        $province->province=$dat["province"];
        $province->save();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "Provinsi berhasil ditambahkan"
        ],200);
    }

    public function edit(Request $request,$id) {
        $dat = $request->all();
         $validator = Validator::make($request->all(), [
            'province' => 'required|string',            
        ]);

        if($validator->fails()){
            return response()->json([
                "statuscode" => 422,
                "message" => $validator->errors()
            ],422);
        } 
        
        $province = Provinces::find($id);
        $province->province=$dat["province"];
        $province->save();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "Provinsi berhasil diupdate"
        ],200);
    }

    public function delete(Request $request, $id) {
        $dat = $request->all();
        // $validator = Validator::make($request->all(), [
        //     'id' => 'required',
        // ]);

        // if($validator->fails()){
        //     return response()->json([
        //         "success" => false,
        //         "message" => $validator->errors()
        //     ],422);
        // } 
        
        $province = Provinces::find($id);
        $province->delete();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "Provinsi berhasil dihapus"
        ],200);
    }

    public function get_Provinces(Request $request) {
        $dat = $request->all();
        $province = Provinces::all();
        if(!$province->isEmpty()) {
            return response()->json([
                "statuscode" => 200,
                "message" => "Data Ditemukan",
                "data" => $province 
            ],200);
        }
        else {
            return response()->json([
                "statuscode" => 404,
                "message" => "Provinsi tidak ditemukan"
            ],404);
        }    
    }

    public function get_province_detail(Request $request,$id) {
        $dat = $request->all();
        $province = Provinces::find($id);
        if(!empty($province)) {
            return response()->json([
                "statuscode" => 200,
                "message" => "Provinsi ditemukan",
                "data" =>$province
            ],200);
        }
        else {
            return response()->json([
                "statuscode" => 404,
                "message" => "Provinsi tidak ditemukan"
            ],404);
        }    
    }
}
