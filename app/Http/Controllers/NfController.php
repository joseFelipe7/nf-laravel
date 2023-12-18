<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nf;
use App\Http\Resources\NfResource;
use App\Http\Requests\StoreNfRequest;

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
        $data['nf_code'] = "123456789";
        
        $nf = Nf::create($data);
        return new NfResource($nf);
    }

    public function show(string $id){
        $nf = Nf::findOrFail($id);
    
        $this->authorize('view', $nf);

        return new NfResource($nf);
        
    }
}