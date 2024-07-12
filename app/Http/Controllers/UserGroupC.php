<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserGroup;

class UserGroupController extends Controller
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
        $user_group = UserGroup::create($request->toArray());
        return response()->json([
            'success' => $user_group ? true : false,
            'message' => $user_group ? 'User Group Successfully Created' : 'Error creating User Group',
            'data' => $user_group
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $user_group = UserGroup::findOrFail($id);
        $user_group->update($request->all());
        return response()->json([
            'success' => $user_group ? true : false,
            'message' => $user_group ? 'User Group Successfully Updated' : 'Error updating User Group',
            'data' => $user_group
        ], 200);
    }

    public function index(Request $request)
    {
        // $query = UserGroup::select('user_groups.*')->get();
        $query = UserGroup::with([
            'userGroupPermissions'
        ])->get();
        return response($query, 200);
    }

    public function destroy(Request $request, $id)
    {
        $user_group = UserGroup::findOrFail($id);
        $user_group->delete($request->all());
        return response()->json([
            'success' => $user_group ? true : false,
            'message' => $user_group ? 'User Group Successfully Deleted' : 'Error deleting User Group'
        ], 200);
    }
}
