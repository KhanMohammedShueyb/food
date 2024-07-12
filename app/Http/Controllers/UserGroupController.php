<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserGroup as Group;

class UserGroupController extends Controller
{
    //
    public function create(Request $request)
    {
        $group = Group::create($request->toArray());
        return response()->json([
            'success' => $group ? true : false,
            'Usergroup' => $group,
            'message' => $group ? "Created" : "Not Created"
        ]);
    }
    public function show(Request $request)
    {
        // $group = Group::all();
        $group = Group::with('GroupPermission')->get();
        return response()->json([
            'success' => $group ? true : false,
            'Usergroup' => $group,
            'message' => $group ? "upload" : "Not uploaded"
        ]);
    }

    public function update($id, Request $request)
    {
        $group = Group::where('id', $id)->update($request->all());
        return response()->json([
            'success' => $group ? true : false,
            'Usergroup' => $group,
            'message' => $group ? "updated" : "Not updated"
        ]);
    }

    public function delete($id)
    {
        $group = Group::where('id', $id)->delete();
        return response()->json([
            'success' => $group ? true : false,
            'Usergroup' => $group,
            'message' => $group ? "deleted" : "Not deleted"
        ]);
    }

    public function GroupPermission(Request $request)
    {
        $userGroup = Group::with(['groupPermission'])->where('id', $request->user_group_id)->get();
        return response()->json([
            'success' => $userGroup ? true : false,
            'userGroup' => $userGroup,
            'message' => $userGroup ? "success" : "error"
        ]);
    }
    
}
