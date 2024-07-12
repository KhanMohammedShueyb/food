<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_group as Group;

class UserGroup extends Controller
{
    //
    public function createProduct(Request $request){
        $group = Group::create($request->toArray());
        return response()->json([
            'success' => $group? true:false,
            'Usergroup' => $group,
            'message' => $group? "Created":"Not Created"
        ]);
    }
    public function showProduct(Request $request){
        $group = Group::all();
        return response()->json([
            'success' => $group? true:false,
            'Usergroup' => $group,
            'message' => $group? "upload":"Not uploaded"
        ]);
    }
    public function updateProduct($id,Request $request){
        $group = Group::where('id',$id)->update($request->all());
        return response()->json([
            'success' => $group? true:false,
            'Usergroup' => $group,
            'message' => $group? "updated":"Not updated"
        ]);
    }
    public function deleteProduct($id){
        $group = Group::where('id',$id)->delete();
        return response()->json([
            'success' => $group? true:false,
            'Usergroup' => $group,
            'message' => $group? "deleted":"Not deleted"
        ]);
    }
}
