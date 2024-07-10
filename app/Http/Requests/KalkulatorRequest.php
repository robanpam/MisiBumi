<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KalkulatorRequest extends FormRequest
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
            'jarak' => 'required|integer',
            'frekuensi' => 'required|integer',
            'option' => 'required'
        ];
    }

    public function messages(){
        return[
            'required' => 'field wajib diisi',
            'integer' => 'field harus numeric',
        ];
    }
}
