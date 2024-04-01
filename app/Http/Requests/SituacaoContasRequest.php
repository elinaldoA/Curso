<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SituacaoContasRequest extends FormRequest
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
            'nome' => 'required|string',
        ];
    }
    public function message(): array
    {
        return [
            'nome.required' => 'Campo nome é obrigatório!',
        ];
    }
}
