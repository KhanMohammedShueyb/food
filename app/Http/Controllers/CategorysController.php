<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategorysController extends Controller
{
    //
    public function create(Request $request){
       
        $category = Categories::create($request->toArray());
        return response()->json([
            'success' => $category?true:false,
            'category' => $category,
            'message' => $category?'category added successfully':'category not added successfully' 

        ],200);
    }
    public function delete($id){
        $category = Categories::where('id', '=', $id)->delete();
        return response()->json([
            'success' => $category?true:false,
            'message' => $category?'category deleted successfully':'category not deleted successfully' 

        ],200);
    }
    public function update($id,Request $request){
        $category = Categories::where('id', '=', $id)->update($request->all());
        return response()->json([
            'success' => $category?true:false,
            'category' => $category,
            'message' => $category?'category updated successfully':'category not updated successfully' 

        ],200);
    }
    public function show(){
        
        $index = Categories::all()->toArray();
        return response()->json([
            "category" => $index
        ]);
    }

    
}
