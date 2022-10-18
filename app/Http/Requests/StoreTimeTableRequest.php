<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimeTableRequest extends FormRequest
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
            'class_type_id' => 'required',
            'term_id' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
            'session_id' => 'required',
            'created_at' => 'nullable|date'
        ];
    }
}
