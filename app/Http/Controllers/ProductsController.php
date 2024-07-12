<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    //
    public function create(Request $request){
        $product = Product::create($request->toArray());
        return response()->json([
            'success' => $product? true:false,
            'Product' => $product,
            'message' => $product? "Created":"Not Created"
        ]);
    }
    public function show(Request $request){
        $product = Product::all();
        return response()->json([
            'success' => $product? true:false,
            'Product' => $product,
            'message' => $product? "upload":"Not uploaded"
        ]);
    }
    public function update($id,Request $request){
        $product = Product::where('id', '=', $id)->update($request->all());
        return response()->json([
            'success' => $product? true:false,
            'Product' => $product,
            'message' => $product? "updated":"Not updated"
        ]);
    }
    public function delete($id){
        $product = Product::where('id', '=' , $id)->delete();
        return response()->json([
            'success' => $product? true:false,
            'Product' => $product,
            'message' => $product? "deleted":"Not deleted"
        ]);
    }
    
}
