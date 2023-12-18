<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\IsCnpj;

class StoreNfRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'value' => ['required', 'decimal:2', 'min:0.1'], 
            'nf_code' => ['required', 'string', 'size:9', 'unique:nfs'],
            'date_issue' => ['required', 'date', "before_or_equal:" . now()->toDateString()], 
            'sender_cnpj' => ['required', new IsCnpj],
            'sender_name' => ['required', 'string', 'min:1', 'max:100'], 
            'delivery_cnpj' => ['required', new IsCnpj],
            'delivery_name' => ['required', 'string', 'min:1', 'max:100']
        ];
    }
}
