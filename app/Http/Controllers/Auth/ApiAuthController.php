<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserNotification;
use App\Models\Notifications;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\URL;
use Mail;
class ApiAuthController extends Controller
{
    //
    use ApiResponser;

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'user_type' => 'required|string|min:1',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $request['password']=Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = [
            'success' => $user ? true : false,
            'message' => $user ? 'User registered successfully' : 'Error registering user',
            'data' => $user,
            'token' => $token
        ];
        $admin_notification = Notifications::create([
               'user_id' => $user->id,
               'message' => $user->first_name.''.$user->last_name. 'has been registerd',
        ]);
        if($request->user_type == 'Researcher'){
            // Mail::to($request->email)->send(new \App\Mail\ResearcherConfirmationEmail($user)); // temporary commented for the main application
            $user_notification = UserNotification::create([
                'user_id' => $user->id,
                'note' => $user->first_name . ' ' . $user->last_name . ' just completed the signed up process.',
                'user_id' => $user->id,
            ]);
        }else{
            $user_notification = UserNotification::create([
                'user_id' => $user->id,
                'note' => $user->first_name . ' ' . $user->last_name . ' just completed the signed up process.',
                'user_id' => $user->id,
            ]);
        }
        return response($response, 201);
    }

    public function login (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails())
        {
            $response = [
                'success' => false,
                'message'=> COUNT($validator->errors()->all())>0 ? $validator->errors()->all()[0] : 'Validation errors'
            ];
            return response($response, 422);
        }
        $user = User::where('users.email', $request->email)
            // ->where('status', 'Enabled')
            ->select('users.*')
            ->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = [
                    'user' => $user,
                    'success' => true,
                    'message'=> 'User Successfully Logged-In',
                    'token' => $token
                ];
                return response($response, 200);
            } else {
                $response = [
                    'success' => false,
                    'message'=> 'Password mismatch'
                ];
                return response($response, 401);
            }
        } else {
            $response = [
                'success' => false,
                'message'=> 'You are unauthenticated user'
            ];
            return response($response, 401);
        }
    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }

    public function resetpassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
         $token = Str::random(32);
        // Mail::send('email_templates.', ['token' => $token], function($message) use($request){
        //     $message->to($request->email);
        //     $message->subject('Reset Password Notification');
        // });
        $url = URL::temporarySignedRoute('confirm_password', now()->addDays(3),['email' => $request->email]);
        Mail::to($request->email)->send(new \App\Mail\PasswordResetEmail($url));
        $response = [
            'success' => true,
            'message'=> 'We have mailed you password rest instructions!',
        ];
        return response($response, 200);
    }
    public function confirmPassword(Request $request)
    {
        return view('form');
    }
    public function update(Request $request, $id)
    {
        $user_model = User::findOrFail($id);
        $user_model->update($request->all());
        return response()->json([
            'success' => $user_model ? true : false,
            'message' => $user_model ? 'Password Successfully Updated' : 'Error updating passwords',
            'data' => $user_model
        ], 200);
    }
}