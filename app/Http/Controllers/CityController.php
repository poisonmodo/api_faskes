<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'province_id' => 'required|integer',
            'city' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                "statuscode" => 422,
                "message" => $validator->errors()
            ],422);
        } 
        
        $City = new Cities;
        $City->province_id=$dat["province_id"];
        $City->city=$dat["city"];
        $City->save();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "Kota berhasil ditambahkan"
        ],200);
    }

    public function edit(Request $request,$id) {
        $dat = $request->all();
         $validator = Validator::make($request->all(), [
            'province_id' => 'required|integer',
            'city' => 'required|string',            
        ]);

        if($validator->fails()){
            return response()->json([
                "statuscode" => 422,
                "message" => $validator->errors()
            ],422);
        } 
        
        $City = Cities::find($id);
        $City->province_id=$dat["province_id"];
        $City->city=$dat["city"];
        $City->save();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "Kota berhasil diupdate"
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
        
        $City = Cities::find($id);
        $City->delete();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "Kota berhasil dihapus"
        ],200);
    }

    public function get_cities(Request $request) {
        $dat = $request->all();
        $City = Cities::all();
        if(!$City->isEmpty()) {
            return response()->json([
                "statuscode" => 200,
                "message" => "Data Ditemukan",
                "data" => $City 
            ],200);
        }
        else {
            return response()->json([
                "statuscode" => 404,
                "message" => "Kota tidak ditemukan"
            ],404);
        }    
    }

    public function get_city_detail(Request $request,$id) {
        $dat = $request->all();
        $City = Cities::find($id);
        if(!empty($City)) {
            return response()->json([
                "statuscode" => 200,
                "message" => "Kota ditemukan",
                "data" =>$City
            ],200);
        }
        else {
            return response()->json([
                "success" => false,
                "message" => "Kota tidak ditemukan"
            ],404);
        }    
    }

}
