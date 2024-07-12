<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserGroupPermisison as Permission;

class UserGroupPermissionController extends Controller
{
    //
    public function create(Request $request)
    {
        $GroupPermission = Permission::create($request->toArray());
        return response()->json([
            'success' => $GroupPermission ? true : false,
            'GroupPermission' => $GroupPermission,
            'message' => $GroupPermission ? "Created" : "Not Created"
        ]);
    }
    public function show(Request $request)
    {
        $GroupPermission = Permission::all();
        return response()->json([
            'success' => $GroupPermission ? true : false,
            'GroupPermission' => $GroupPermission,
            'message' => $GroupPermission ? "upload" : "Not uploaded"
        ]);
    }
    public function update($id, Request $request)
    {
        $GroupPermission = Permission::where('user_group_id', $id)->update($request->all());
        return response()->json([
            'success' => $GroupPermission ? true : false,
            'GroupPermission' => $GroupPermission,
            'message' => $GroupPermission ? "updated" : "Not updated"
        ]);
    }
    public function delete($id)
    {
        $GroupPermission = Permission::where('id', $id)->delete();
        return response()->json([
            'success' => $GroupPermission ? true : false,
            'GroupPermission' => $GroupPermission,
            'message' => $GroupPermission ? "deleted" : "Not deleted"
        ]);
    }
}
