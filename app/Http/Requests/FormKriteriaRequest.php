<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormKriteriaRequest extends FormRequest
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
            'nama' => 'required',
            'bobot' => 'required|numeric'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nama.required' => 'Inputan :attribute tidak boleh kosong',
            'bobot.required' => 'Inputan :attribute tidak boleh kosong',
            'bobot.numeric' => 'Inputan :attribute hanya dapat berupa angka',
        ];
    }
}
