<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['store']]);
        if(auth()->user()) $this->user = auth()->user()->toArray();

    }
    public function index(Request $request){
        $this->authorize('admin', auth()->user());

        $perPage = $request->per_page ?? 15;
        $user = User::paginate($perPage);

        return UserResource::collection($user);
    }
    public function store(StoreUserRequest $request){
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        
        $user = User::create($data);

        return new UserResource($user);

    }
    public function show(string $id){
        $this->authorize('admin', auth()->user());

        $user = User::findOrFail($id);
        return new UserResource($user);
    }
    
    public function update(UpdateUserRequest $request, string $id){
        $this->authorize('admin', auth()->user());

        $user = User::findOrFail($id);
        $data = $request->validated();
        if ($request->password) $data['password'] = bcrypt($request->password);

        $user->update($data);

        return new UserResource($user);
    }
    public function destroy(string $id){
        $this->authorize('admin', auth()->user());

        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([], 204);
    }
}
