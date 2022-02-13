<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormNilaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_alternatif' => 'required|exists:alternatif,id',
            'id_kriteria' => 'required|exists:kriteria,id',
            'id_parameter' => 'required|exists:parameter,id',
        ];
    }

    public function messages()
    {
        return [
            'id_alternatif.required' => 'Alternatif harus dipilih',
            'id_kriteria.required' => 'Kriteria harus dipilih',
            'id_parameter.required' => 'parameter harus dipilih',
        ];
    }
}
