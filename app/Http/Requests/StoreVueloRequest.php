<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreVueloRequest extends FormRequest
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
            'codigo' => 'string|alpha_num|regex:/^[a-zA-Z]{3}[0-9]{4}$/i|required',
            'origen_id' => 'integer|exists:aeropuertos,id|required',
            'destino_id' => 'integer|different:origen_id|exists:aeropuertos,id|required',
            'companya_id' => 'integer|exists:companyas,id|required',
            'salida' => 'date|required',
            'llegada' => 'date|different:salida|required',
            'plazas' => 'integer|required',
            'precio' => 'decimal:2|required'

        ];
    }
}
