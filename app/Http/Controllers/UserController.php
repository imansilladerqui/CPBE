<?php

namespace App\Http\Controllers;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function signup(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:tc_users',
            'password' => 'required'
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $user->save();
        return response()->json([
            'message' => 'Usuario creado con exito'
        ], 201);
    }

    public function signin(Request $request) {
        $this->validate($request, [
            'name' => 'required',
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

    public function getall()
    {
        $users = User::all();
        return $users;
    }

    public function getuserid($id)
    {
        $user = User::find($id);
        return $user;
        
    }
}