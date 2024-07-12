<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Ordersss;
use Illuminate\Http\Request;


class OrdersController extends Controller
{
    //
    public function createOrders(Request $request){
        $Orderss = Ordersss::create($request->toArray());
        return response()->json([
            'success'=> $Orderss? true:false,
            'Order' => $Orderss,
            'message' => $Orderss ? "Created": "Not Created",
        ]); 
    }
    public function showOrders(Request $request){
        
        $authUser = $request->toArray();
        if($authUser['type'] == "admin"){
            $Orderss = Ordersss::all();
        }
        else if($authUser['type'] == "customer"){
            $Orderss = Ordersss::where('user_id', $authUser['id'])->get();
        }
        return response()->json([
            'success'=> $Orderss? true:false,
            'Order' => $Orderss,
            'message' => $Orderss ? "Uploaded": "Not Uploaded"
        ]); 
    }
}
