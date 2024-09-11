<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipamentoRequest extends FormRequest
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
            "patrimonio" => "required|integer",
            "id_fabricante" => "required|exists:fabricante,id",
            "id_produto" => "required|exists:produto,id",
            "id_maquina" => "nullable|exists:maquina,id" // Corrigir para id_maquina
        ];
    }

    public function messages(): array
    {
        return [
            'patrimonio.required' => 'O patrimônio é obrigatório',
            'id_fabricante.required'=> 'O fabricante é obrigatório',
            'id_produto.required'=> 'O produto é obrigatório',
            'id_fabricante.exists'=>'Fabricante não encontrado',
            'id_produto.exists'=>'Produto não encontrado',
            'id_maquina.exists' => 'Máquina vinculada não encontrada' // Mensagem para id_maquina
        ];
    }
}
