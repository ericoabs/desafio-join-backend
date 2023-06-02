<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdutoRequest extends NoRedirectRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id_categoria_produto' => 'exists:tb_categoria_produto,id_categoria_planejamento',
            'nome_produto' => 'string|max:150',
            'valor_produto' => 'decimal:0,2'
        ];
    }
}
