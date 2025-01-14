<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class InvLenteTermRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre_lente' => 'required|string|max:150', // Obligatorio, cadena, longitud máxima 255
            'marca_lente' => 'required|string|max:100', // Obligatorio, cadena, longitud máxima 100
            'diseno_lente' => 'required|string|max:100', // Opcional, cadena, longitud máxima 100
            'esf_desde' => 'required|string|max:10',
            'cil_desde' => 'required|string|max:10',
            'esf_hasta' => 'required|string|max:10',
            'cil_hasta' => 'required|string|max:10',
        ];
    }

    public function messages()
    {
        return [
            'nombre_lente.required' => 'El campo nombre del lente es obligatorio.',
            'nombre_lente.string' => 'El nombre del lente debe ser una cadena de texto.',
            'nombre_lente.max' => 'El nombre del lente no debe exceder los 150 caracteres.',
    
            'marca_lente.required' => 'El campo marca del lente es obligatorio.',
            'marca_lente.string' => 'La marca del lente debe ser una cadena de texto.',
            'marca_lente.max' => 'La marca del lente no debe exceder los 100 caracteres.',
    
            'diseno_lente.string' => 'El diseño del lente debe ser una cadena de texto.',
            'diseno_lente.max' => 'El diseño del lente no debe exceder los 100 caracteres.',
    
            'esf_desde.required' => 'El campo esfera desde es obligatorio.',
            'esf_desde.max' => 'El esfera del lente no debe exceder los 10 caracteres.',
    
            'cil_desde.required' => 'El campo cilindro desde es obligatorio.',
            'cil_desde.max' => 'El cilindro del lente no debe exceder los 10 caracteres.',
    
            'esf_hasta.required' => 'El campo esdera hasta es obligatorio.',
            'esf_hasta.max' => 'El esfera del lente no debe exceder los 10 caracteres.',
    
            'cil_hasta.required' => 'El campo cilindro hasta es obligatorio.',
            'cil_hasta.max' => 'El cilindro del lente no debe exceder los 10 caracteres.'
        ];
    }
}
