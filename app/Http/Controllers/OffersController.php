<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    //

    public function create(Request $request){
        $offer = Offer::create($request -> toArray());
        return response()->json([
            'success' => $offer ? true:false,
            'message' => $offer ? "Created": "not Created",
            'Offer' => $offer
        ]);
    }
    public function show(Request $request){
        $offer = Offer::all();
        return response()->json([
            'success' => $offer ? true:false,
            'message' => $offer ? "success": "error",
            'Offer' => $offer
        ]);
    }
    public function delete($id){
        $offer = Offer::where('id', '=', $id)->delete();
        return response()->json([
            'success' => $offer ? true:false,
            'message' => $offer ? "deleted": "not deleted",
            'Offer' => $offer
        ]);
    }
    public function update($id,Request $request){
        
        $offer = Offer::where('id', '=', $id)->update($request->all());
        return response()->json([
            'success' => $offer ? true:false,
            'message' => $offer ? "updated": "not updated",
            'Offer' => $offer
        ]);
    }
}
