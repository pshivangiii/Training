<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:employee_details|max:50',
            'password' =>  'required|min:6|max:15',
            'password-repeat' => 'required|min:6|max:15|same:password',
        ];
    }
    // public function messages()
    // {
    //     return[
    //         'email.unique' => 'Email already exists'
    //     ];
    // }

}
