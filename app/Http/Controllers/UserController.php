<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function create(Request $request)
    {
        //
        $dat = $request->all();
         $validator = Validator::make($request->all(), [
            'email'     => 'required|valid_email',
            'password'  => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json([
                "statuscode" => 422,
                "message" => $validator->errors()
            ],422);
        } 
        
        $usr = new User;
        $usr->email=$dat["email"];
        $usr->password=Hash::make('password');
        $usr->save();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "User berhasil ditambahkan"
        ],200);
    }

    public function edit(Request $request,$id) {
        $dat = $request->all();
         $validator = Validator::make($request->all(), [
            'email'     => 'required|valid_email',
            'password'  => 'required|string'            
        ]);

        if($validator->fails()){
            return response()->json([
                "statuscode" => 422,
                "message" => $validator->errors()
            ],422);
        } 
        
        $usr = User::find($id);
        $usr->email=$dat["email"];
        $usr->password=Hash::make('password');
        $usr->save();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "User berhasil diupdate"
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
        
        $usr = User::find($id);
        $usr->delete();
       
        return response()->json([
            "statuscode" => 200,
            "message" => "User berhasil dihapus"
        ],200);
    }

    public function get_Users(Request $request) {
        $dat = $request->all();
        $usr = User::all();
        if(!$usr->isEmpty()) {
            return response()->json([
                "statuscode" => 200,
                "message" => "Data Ditemukan",
                "data" => $usr 
            ],200);
        }
        else {
            return response()->json([
                "statuscode" => 404,
                "message" => "User tidak ditemukan"
            ],404);
        }    
    }

    public function get_user_detail(Request $request,$id) {
        $dat = $request->all();
        $usr = User::find($id);
        if(!empty($usr)) {
            return response()->json([
                "statuscode" => 200,
                "message" => "User ditemukan",
                "data" =>$usr
            ],200);
        }
        else {
            return response()->json([
                "statuscode" => 404,
                "message" => "User tidak ditemukan"
            ],404);
        }    
    }
}
    