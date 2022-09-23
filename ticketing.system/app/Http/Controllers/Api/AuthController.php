<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserSuccessRegisterNotification;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    use ApiResponser;

    public function register(Request $request)
    {
        $user = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'role'=>'required',
            'password' => 'required|string|min:6'
        ]);

        $user = User::create([
            'name' => $user['name'],
            'password' => $user['password'],
            'role'=>$user['role'],
            'email' => $user['email']
        ]);
        $user->assignRole($user['role']);

        Notification::route('mail',$user['email'])
        ->notify(new UserSuccessRegisterNotification($user));

        return $this->success([
            'token' => $user->createToken('API Token')->plainTextToken
        ]);
    }   

    public function login(Request $request)
    {    
        //validate input
        $input = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

          // cross check with table exist 
        $user=User::where('email',$input['email'])->first();
        // dd($user && Hash::check($input['password'],$user->password));

        if($user && Hash::check($input['password'],$user->password)){
            $token=$user->createToken('API token')->plainTextToken;
            return response()->json([
                'message'=>'Success login',
                'data'=>[
                    'token'=>$token
                ]
                ]); 


        }

        abort(404,'teacher not registered');

    }

    public function logout()
    {
       // dd(Auth::user()->tokens);
       Auth::user()->tokens->last()->delete();
       return 'logout sucessful';
    }
}

