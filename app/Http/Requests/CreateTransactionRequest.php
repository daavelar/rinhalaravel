<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'valor' => 'required|numeric|gt:0',
            'tipo' => 'required|in:c,C,d,D',
            'descricao' => 'min:1,max:10'
        ];
    }
}
