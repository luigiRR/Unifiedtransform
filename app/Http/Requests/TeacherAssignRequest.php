<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherAssignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('assign teachers');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $message = 'required|integer';
        return [
            'course_id'             => ($message),
            'semester_id'           => ($message),
            'class_id'              => ($message),
            'section_id'            => ($message),
            'teacher_id'            => ($message),
            'session_id'            => ($message),
        ];
    }
}
