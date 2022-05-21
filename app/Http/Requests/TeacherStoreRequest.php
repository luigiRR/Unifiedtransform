<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create users');
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $message = 'required|string';
        return [
            'first_name'    => ($message),
            'last_name'     => ($message),
            'email'         => 'required|string|email|max:255|unique:users',
            'gender'        => ($message),
            'nationality'   => ($message),
            'phone'         => ($message),
            'address'       => ($message),
            'address2'      => 'string',
            'city'          => ($message),
            'zip'           => ($message),
            'photo'         => 'nullable|string',
            'password'      => 'required|string|min:8',
        ];
    }
}
