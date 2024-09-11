<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaquinaRequest extends FormRequest
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
            "patrimonio"=>"required|integer",
            "id_fabricante"=>"required|exists:fabricante,id",
            "id_usuario"=>"nullable|exists:usuario,id",
        ];
    }

    public function messages(): array
    {
        return[
            'patrimonio.required' => 'O patrimônio é obrigatório',
            'id_fabricante.required'=>'O Fabricante é obrigatório',
            'id_fabricante.exists'=> 'Fabricante não encontrado',
            'id_usuario.exists'=> 'O usuário não encontrado'
        ];
    }
}
