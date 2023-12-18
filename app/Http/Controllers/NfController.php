<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nf;
use App\Http\Resources\NfResource;
use App\Http\Requests\StoreNfRequest;
use App\Http\Requests\UpdateNfRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserStoreNfNotification;

class NfController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
        if(auth()->user()) $this->user = auth()->user()->toArray();
        
    }
    public function index(Request $request){
        $perPage = $request->per_page ?? 15;

        $nf = Nf::where('user_id', $this->user['id'])->paginate($perPage);
        
        return NfResource::collection($nf);
    }
    
    public function store(StoreNfRequest $request){
        $data = $request->validated();
        
        $data['user_id'] = $this->user['id'];
        
        $nf = Nf::create($data);

        auth()->user()->notify(new UserStoreNfNotification($nf));

        return new NfResource($nf);
    }

    public function show(string $id){
        $nf = Nf::findOrFail($id);
    
        $this->authorize('view', $nf);
       
        return new NfResource($nf);
        
    }
    public function update(UpdateNfRequest $request, string $id){
        $nf = Nf::findOrFail($id);
        $this->authorize('update', $nf);
       
        $data = $request->validated();
      
        $nf->update($data);

        return new NfResource($nf);
    }

    public function destroy(string $id){
        $nf = Nf::findOrFail($id);
        $this->authorize('delete', $nf);

        $nf->delete();

        return response()->json([], 204);
    }
}