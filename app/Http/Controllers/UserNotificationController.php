<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserNotification;

class UserNotificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Request $request)
    {
        $user_notification = UserNotification::create($request->toArray());
        return response()->json([
            'success' => $user_notification ? true : false,
            'message' => $user_notification ? 'Notification Successfully Created' : 'Error creating Notification',
            'data' => $user_notification
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $user_notification = UserNotification::findOrFail($id);
        $user_notification->update($request->all());
        return response()->json([
            'success' => $user_notification ? true : false,
            'message' => $user_notification ? 'Notification Successfully Updated' : 'Error updating Notification',
            'data' => $user_notification
        ], 200);
    }

    public function index(Request $request)
    {
        // $query = UserNotification::select('user_notifications.*')->get();
        $query = UserNotification::get();
        return response($query, 200);
    }

    public function destroy(Request $request, $id) {
        $user_notification = UserNotification::findOrFail($id);
        $user_notification->delete($request->all());
        return response()->json([
            'success' => $user_notification ? true : false,
            'message' => $user_notification ? 'Notification Successfully Deleted' : 'Error deleting Notification'
        ], 200);
    }
}
