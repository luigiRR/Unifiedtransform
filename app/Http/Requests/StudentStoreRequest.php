<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
            'first_name'        => ($message),
            'last_name'         => ($message),
            'email'             => 'required|string|email|max:255|unique:users',
            'gender'            => ($message),
            'nationality'       => ($message),
            'phone'             => ($message),
            'address'           => ($message),
            'address2'          => 'nullable|string',
            'city'              => ($message),
            'zip'               => ($message),
            'photo'             => 'nullable|string',
            'birthday'          => 'required|date',
            'religion'          => ($message),
            'blood_type'        => ($message),
            'password'          => 'required|string|min:8',

            // Parents' information
            'father_name'       => ($message),
            'father_phone'      => ($message),
            'mother_name'       => ($message),
            'mother_phone'      => ($message),
            'parent_address'    => ($message),

            // Academic information
            'class_id'          => 'required',
            'section_id'        => 'required',
            'board_reg_no'      => 'string',
            'session_id'        => 'required',
            'id_card_number'    => 'required',
        ];
    }
}
