<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Illuminate\Http\Request;

class UserController extends Controller {
    
    public function signup(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|unique:tc_users',
            'password' => 'required'
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $user->save();
        
        $user->roles()->attach(Role::where('name', 'user')->first());

        return response()->json([
            'message' => 'Usuario creado con exito'
        ], 201);
    }

    public function signin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        try {
            if(!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'error' => 'Credenciales invalidas!'
                ], 401);
            }
        } catch(JWTException $e) {
            return response()->json([
                'error' => 'No se puede crear el token'
            ], 500);
        }

        return response()->json([
            'token' => $token
        ], 200); 
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    // public function getall()
    // {
    //     $users = User::all();
    //     return $users;
    // }

    // public function getuserid($id)
    // {
    //     $user = User::find($id);
    //     return $user;
        
    // }
}