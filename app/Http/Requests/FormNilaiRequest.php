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
            'nilai.*' => 'required|exists:parameter,id',
        ];
    }

    public function messages()
    {
        return [
            'nilai.*.required' => 'Inputan ini harus dipilih',
        ];
    }
}
