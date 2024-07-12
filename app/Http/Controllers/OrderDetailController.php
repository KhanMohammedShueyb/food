<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\OrderDetails;


class OrderDetailController extends Controller
{
    //
    public function CreateOrdersDetails(Request $request)
    {
        $orderDetail = OrderDetails::create($request->toArray());
        return response()->json([
            'success' => $orderDetail ? true : false,
            'Order' => $orderDetail,
            'message' => $orderDetail ? "Created" : "Not Created",
        ]);
    }
    public function showOrdersDetails(Request $request)
    {
        $authUser = $request->toArray();
        $authID = $authUser['id'];
        if ($authUser['type'] == "admin") {
            $Orderdetails = OrderDetails::all();
            return response()->json([
                'success' => $Orderdetails ? true : false,
                'Order' => $Orderdetails,
                'message' => $Orderdetails ? "Uploaded" : "Not Uploaded"
            ]);
        } else if ($authUser['type'] == "customer") {
            $Orderdetails = OrderDetails::whereHas("order", function ($query) use ($authID) {
                $query->where("user_id", $authID);
            })->get();
            return response()->json([
                'success' => $Orderdetails ? true : false,
                'Order' => $Orderdetails,
                'message' => $Orderdetails ? "Uploaded" : "Not Uploaded"
            ]);
        }
    }
}
