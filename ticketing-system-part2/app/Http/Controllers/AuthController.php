<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponser;

    public function register(Request $request)
    {
        $user = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'role_id'=>'required|exists:roles,id',
            'password' => 'required|string|min:6'
        ]);

        $user=User::create($request->all());
        return response()->json([
            'message'=>'Success register',
            'data'=>[
                'token'=>$user->createToken('API Token')->plainTextToken,
                'role'=>$user->roles->role,
                // 'user'=> new UserResource($user)
            ],
            

        
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
                    'token'=>$token,
                    'role'=>$user->roles->role
                ]
                ]); 


        }

        abort(404,'user not registered');

    }

    public function logout()
    {
        
    //    dd(Auth::user());
       Auth::user()->tokens->last()->delete();
       return 'logout sucessful';
    }
}

