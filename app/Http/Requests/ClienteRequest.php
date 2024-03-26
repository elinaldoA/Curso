<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'active' => 'required',
        ];
    }

    public function messages(): array
    {
        return[
            'name.required' => 'Campo nome é obrigatório!',
            'last_name.required' => 'Campo sobrenome é obrigatório!',
            'email.required' => 'Campo e-mail é obrigatório!',
            'active.required' => 'Campo situação do cliente é obrigatório!',
        ];
    }
}
