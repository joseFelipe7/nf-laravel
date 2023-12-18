<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NfResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nf_code' => $this->nf_code,
            'value' => $this->value,
            'sender_cnpj' => $this->sender_cnpj,
            'sender_name' => $this->sender_name,
            'delivery_cnpj' => $this->delivery_cnpj,
            'delivery_name' => $this->delivery_name,
            'date_issue' => Carbon::make($this->date_issue)->format('Y-m-d'),
            'created' => Carbon::make($this->created_at)->format('Y-m-d'),
        ];  
    }
}
