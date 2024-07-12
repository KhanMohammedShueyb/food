<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Subcategory;



class SubcategoryController extends Controller
{
    //
    public function create(Request $request)
    {
        $subcategory = Subcategory::create($request->toArray());
        return response()->json([
            'success' => $subcategory ? true:false ,
            'Subcategory' => $subcategory,
            'message' => $subcategory ? 'Created Successfully' : 'Created Unsuccessfully'
            
        ]);
    }
    public function show(Request $request)
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
    public function delete($id)
    {
        $subcategory = Subcategory::destroy($id);
        return response()->json([
            'message' =>$subcategory? 'Subcategory deleted successfully':'Subcategory deleted unsuccessfully',
            'success' => $subcategory ? true:false ,
        ]);
    }

    public function update($id,Request $request)
    {   $subcategory = Subcategory::findOrFail($id);
        $subcategory->update($request->all());
        return response()->json([
            'message' =>$subcategory? 'Subcategory Updated successfully':'Subcategory Updated unsuccessfully',
            'success' => $subcategory ? true:false ,
        ]);
    }


}
