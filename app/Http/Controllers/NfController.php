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
        $this->user = auth()->user()->toArray();
    }
    public function store(StoreNfRequest $request){
        $data = $request->validated();
        $data['user_id'] = $this->user['id'];
        $data['nf_code'] = "123456789";
        // dd($data);
        $nf = Nf::create($data);
        return new NfResource($nf);

    }
}
