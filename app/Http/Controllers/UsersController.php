<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestEmail;
use App\Models\User;
use App\Models\UserGroup;

class UsersController extends Controller
{
    //
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('appToken')->accessToken;

            return response()->json([
                'success' => true,
                'token' => $success,
                'user' => $user,
            ]);
        } else {

            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }
    }



    public function register(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'gender' => 'required',
            'phno' => 'required|regex:/(0)[0-9]{10}/',
            'type' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 401);
        }
        $input = $request->all();
        $input['otp'] = rand(000000, 999999);
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user->markEmailAsVerified();
        Mail::to($user->email)->send(new MyTestEmail($user));
        // dd($user);
        $success['token'] = $user->createToken('appToken')->accessToken;
        // dd($success['token']);
        return response()->json([
            'success' => true,
            'token' => $success,
            'user' => $user
        ]);
    }

    public function logout(Request $res)
    {
        if (Auth::User()) {
            $user = Auth::user()->token();
            $user->revoke();
            return response()->json([
                'success' => true,
                'message' => 'Logout successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to Logout'
            ]);
        }
    }
    public function ShowUser(Request $request)
    {
      
        $auth = $request->toArray();
        $user = User::query();
        
        
        if ($auth['type'] == 'admin') {
            $user = $user->get();
        } else {
            $user = $user->where('id', $auth['id'])->get();
        }

        return response()->json([
            'success' => $user ? true : false,
            'user' => $user,
        ]);
    }

    public function otp(Request $request)
    {
        $input = $request->all();
        $update = User::where('id', $input['data']['id'])
            ->where('otp', $input['input']['otp'])
            ->update(['isLogin' => 1]);
        $user = User::where('id', $input['data']['id'])->get();
        return response()->json([
            'success' => $update ? true : false,
            'token' => $input['token']['token'],
            'user' => $user,
        ]);
    }

    public function update($id, Request $request)
    {
        $update = User::where('id', $id)->update($request->all());
        return response()->json([
            'success' => $update ? true : false,
            'user' => $update,
            'message' => $update ? "updated" : "Not updated"
        ]);
    }
    public function delete($id, Request $request)
    {
        $update = User::where('id', $id)->delete();
        return response()->json([
            'success' => $update ? true : false,
            'user' => $update,
            'message' => $update ? "updated" : "Not updated"
        ]);
    }

    
}
