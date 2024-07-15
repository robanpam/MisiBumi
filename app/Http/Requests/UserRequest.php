<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nama' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'password' => 'required',
            'repassword' => 'required|same:password',
        ];
    }

    public function messages(){
        return [
            'nama.required' => 'field harus diisi',
            'email.required' => 'field harus diisi',
            'email.email' => 'isi dengan email yang benar',
            'phone.required' => 'field harus diisi',
            'phone.numeric' => 'field harus berupa angka',
            'password.required' => 'field harus diisi',
            'repassword.required' => 'field harus diisi',
            'repassword.same' => 'isi dengan password yang sesuai',
        ];
    }
}
