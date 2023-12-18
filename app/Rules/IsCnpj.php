<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IsCnpj implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Valida tamanho
        if (strlen($value) != 14){
            $fail('The :attribute must be cnpj.');
            return;
        }
        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $value)){
            $fail('The :attribute must be cnpj.');	
            return ;
        }
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $value[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($value[12] != ($resto < 2 ? 0 : 11 - $resto)){
            $fail('The :attribute must be cnpj.');
            return;
        }
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $value[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if(!($value[13] == ($resto < 2 ? 0 : 11 - $resto))){
            $fail('The :attribute must be cnpj.');
            return;
        }
    }
}
