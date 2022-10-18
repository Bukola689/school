<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
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
            'user_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required',
            'occupation_id' => 'required',
            'd_o_b' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'local_government_id' => 'required',
            'image' => 'required',
            'qualification' => 'required',
            'address' => 'required',
        ];
    }
}
