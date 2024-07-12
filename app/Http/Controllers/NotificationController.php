<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;
use DB;

class NotificationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    public function index(Request $request)
    {
        
        
        
        $query = Notifications::join('users', 'notifications.user_id', '=', 'users.id')
                                ->get(['notifications.*', 'users.user_type']);
                                 return array(
                                 'notifications' => $query->toArray()
                                  );
        // return response($query, 200);
        // $query = DB::table('notifications')
        // ->join('users', 'notifications.user_id', '=', 'users.id')
        // ->select('notifications.*', 'user.user_type')
        // ->get();
        
        // $query = DB::table('notifications')
        //     ->join('users', 'users.id', '=', 'notifications.user_id')
        //     ->select('notifications.*', 'users.users_type')
        //     ->get();
        //     return array(
        //             'notifications' => $query->toArray());
       
        
        // $query=DB::table('notifications.*')
        // ->select(['user.id','user.user_type','notifications.*'])
        // ->join('users', 'users.id', '=', 'notifications.user_id');
        // $result= $query->get();
        // return array(
        //     'status' => 'success',
        //     'scores' => $result->toArray());
       
        // $query=Notifications::select('notifications.*')
        // ->join('users','user.id','=','notifications.user_id')
        // ->select('user.user_type','notifications.*')
        // ->get();
        // // $query=DB::table('notifications')
        // //   ->select(['notifications.user_id','notifications.message',  'notifications.created_at'])
        // //    $query->get();
        // // return array(
        // //     'status' => 'success',
        // //     'scores' => $query->toArray());
    }
}
