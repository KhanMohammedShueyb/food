<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
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

    public function index(Request $request)
    {   
    //    dd($request->userValidOrNot);
        $query=DB::table('users')
         ->select('users.*','scores.score','scores.estimated_time',DB::raw("CONCAT(users.first_name, ' ', users.last_name) as full_name"))
         ->leftjoin('scores', 'scores.user_id', '=', 'users.id');

         if(isset($request->userSearchQuery) && !empty($request->userSearchQuery)){
             $query= $query->where('users.first_name','like', '%' . $request->userSearchQuery . '%',);
         };
         if(isset($request->userType) && !empty($request->userType)){
            $query= $query->where('users.user_type',$request->userType);
        };
        if(isset($request->userValidOrNot)){
            $query= $query->where('users.is_valid', $request->userValidOrNot);
        };
        $query = $query->get();
        return response($query, 200);
    }

    public function update(Request $request, $id)
    {    
        $user_group = User::findOrFail($id);
        if(isset($request->password) && !empty($request->password)){
            $request['password'] = Hash::make($request['password']);
        }
        $user_group->update($request->all());
        $user=User::findOrFail($id)
              ->update(['is_valid' => $request->is_valid]);
        return response()->json([
            'success' => $user_group ? true : false,
            'message' => $user_group ? 'User Successfully Updated' : 'Error updating User',
            'data' => $user_group
        ], 200);
    }

    public function destroy(Request $request, $id) {
        $user_group = User::findOrFail($id);
        $user_group->delete($request->all());
        return response()->json([
            'success' => $user_group ? true : false,
            'message' => $user_group ? 'User Successfully Deleted' : 'Error deleting User'
        ], 200);
    }
}
