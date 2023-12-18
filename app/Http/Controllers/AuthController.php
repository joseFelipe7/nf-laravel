<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\LoginAuthRequest;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{

    public function __construct(){
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(LoginAuthRequest $request){
        $credentials = $request->validated();

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'data' => array(),
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
            'data' => new UserResource($user),
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ],200);
    }

    public function logout(){
        Auth::logout();
        return response()->json([
            'message' => 'Success logged out',
        ], 200);
    }

    public function refresh(){
        return response()->json([
            'data' => new UserResource(Auth::user()),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}