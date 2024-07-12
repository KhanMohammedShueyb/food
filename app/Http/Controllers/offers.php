<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use Illuminate\Http\Request;

class offers extends Controller
{
    //

    public function createOffer(Request $request){
        $offer = Offer::create($request -> toArray());
        return response()->json([
            'success' => $offer ? true:false,
            'message' => $offer ? "Created": "not Created",
            'Offer' => $offer
        ]);
    }
    public function showOffer(Request $request){
        $offer = Offer::all();
        return response()->json([
            'success' => $offer ? true:false,
            'message' => $offer ? "Bavo": "error",
            'Offer' => $offer
        ]);
    }
    public function deleteOffer($id){
        $offer = Offer::where('Id', '=', $id)->delete();
        return response()->json([
            'success' => $offer ? true:false,
            'message' => $offer ? "deleted": "not deleted",
            'Offer' => $offer
        ]);
    }
    public function updateOffer($id,Request $request){
        $offer = Offer::where('Id', '=', $id)->update($request->all());
        return response()->json([
            'success' => $offer ? true:false,
            'message' => $offer ? "updated": "not updated",
            'Offer' => $offer
        ]);
    }
}
