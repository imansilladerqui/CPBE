<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Auth;
use Illuminate\Http\Request;


use App\Http\Resources\allUsuarios as allUsuarios;

class UserController extends Controller {
    
    public function signup(Request $request) {
        $this->validate($request, [
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:tc_users',
            'password' => 'required'
        ]);

        $user = new User([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
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
        $user = $request->user();

        $response= [
            'id' => $user->id, 
            'avatar'=> $user->avatar,
            'email'=> $user->email,
            'nombre'=> $user->nombre,
            'apellido'=> $user->apellido,
            'created_at' => $user->created_at->toDateTimeString(),
            'updated_at' => $user->updated_at->toDateTimeString(),
            'roleId' => $user->roles->first()->id,
            'roleName' => $user->roles->first()->name,
        ];

        return response()->json($response);
    }

    public function allusuarios()
    {
        $user = User::orderBy('id', 'desc')->get();
        return allUsuarios::collection($user);
    }

    public function getusuario($id)
    {
        $user = User::where('id', $id)->get();
        return allUsuarios::collection($user);
    }

    public function deleteusuario($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    public function getProfile(Request $request, $id)
    {
        $user = Auth::user();
        return $user;
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $data = $this->validate($request, [
            'nombre' => 'required',
            'apellido' => 'required',
        ]);

        $user->name = $data['nombre'];
        $user->email = $data['apellido'];

       if($request->hasFile('avatar')) {
           $avatar = $request->file('avatar');
           $filename = time() . '.' . $avatar->getClientOriginalExtension();
           Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));

           $user->avatar = $filename;
       }

       $user->save();
    }

    public function deleteProfile(Request $request)
    {
        $user = Auth::user();
        $user->delete();
    }

}