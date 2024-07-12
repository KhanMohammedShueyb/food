<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Subcategory;



class Subcategorys extends Controller
{
    //
    public function createSubCateg(Request $request)
    {
        $subcategory = Subcategory::create($request->toArray());
        return response()->json([
            'data' => $subcategory ? true:false ,
            'Subcategory' => $subcategory,
            'message' => $subcategory ? 'Created Successfully' : 'Created Unsuccessfully'
            
        ]);
    }
    public function showSubCateg(Request $request)
    {
        // $category1 = Subcategory::with('category')->get();
        // dd("ids are : ",$category1->toArray());
        $subcategory = Subcategory::all();
        return response()->json([
            'success' => $subcategory ? true : false,
            'Subcategory' => $subcategory,
            'message' => $subcategory ? 'uploaded Successfully' : 'uploaded Unsuccessfully'
        ]);
    }
    public function deleteSubCateg($id)
    {
        $subcategory = Subcategory::destroy($id);
        return response()->json([
            'message' =>$subcategory? 'Subcategory deleted successfully':'Subcategory deleted unsuccessfully',
            'data' => $subcategory ? true:false ,
        ]);
    }

    public function updateSubCateg($id,Request $request)
    {   $subcategory = Subcategory::findOrFail($id);
        $subcategory->update($request->all());
        return response()->json([
            'message' =>$subcategory? 'Subcategory Updated successfully':'Subcategory Updated unsuccessfully',
            'data' => $subcategory ? true:false ,
        ]);
    }


}
