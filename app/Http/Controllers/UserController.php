<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return UserResource::collection($user);
        // return response()->json(array("message"=>"Api ok"), 200);
    }
    public function show(string $id){
        return response()->json(array("message"=>"Api ok"), 200);
    }
    public function store(){
        return response()->json(array("message"=>"Api ok"), 200);
    }
    public function update(string $id){
        return response()->json(array("message"=>"Api ok"), 200);
    }
    public function destroy(string $id){
        return response()->json(array("message"=>"Api ok"), 200);
    }
}
