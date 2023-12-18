<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\IsCnpj;

class UpdateNfRequest extends FormRequest
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
            'value' => ['nullable', 'decimal:2', 'min:0.1'], 
            'date_issue' => ['nullable', 'date', "before_or_equal:" . now()->toDateString()], 
            'sender_cnpj' => ['nullable', new IsCnpj],
            'sender_name' => ['nullable', 'string',  'min:1', 'max:100'], 
            'delivery_cnpj' => ['nullable', new IsCnpj],
            'delivery_name' => ['nullable', 'string',  'min:1', 'max:100']
        ];
    }
}
