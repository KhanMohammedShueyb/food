<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\orderDetails;
use App\Models\Ordersss;

class OrderProductDetails extends Controller
{
    //
    public function CreateOrdersDetails(Request $request){
        $orderDetail = orderDetails::create($request->toArray());
        return response()->json([
            'success'=> $orderDetail? true:false,
            'Order' => $orderDetail,
            'message' => $orderDetail ? "Created": "Not Created",
        ]); 
    }
    public function showOrdersDetails(Request $request){
        $authUser = $request->toArray();
        $authID = $authUser['id'];
        if($authUser['type'] == "admin"){
            $Orderdetails = orderDetails::all();
            return response()->json([
                'success'=> $Orderdetails? true:false,
                'Order' => $Orderdetails,
                'message' => $Orderdetails ? "Uploaded": "Not Uploaded"
            ]); 
        }
        else if($authUser['type'] == "customer"){
            $Orderdetails = orderDetails::whereHas("order",function($query) use($authID){
                $query->where("user_id",$authID);
            })->get();
                return response()->json([
                'success'=> $Orderdetails? true:false,
                'Order' => $Orderdetails,
                'message' => $Orderdetails ? "Uploaded": "Not Uploaded"
            ]); 
        }
    }
}
