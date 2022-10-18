<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            'name' => 'required',
            'email' => 'required',
            // 'occupation_id' => 'required',
            // 'gender' => 'required',
            // 'd_o_b' => 'required',
            // 'phone_number' => 'required',
            // 'image' => 'required',
            // 'country_id' => 'required',
            // 'state_id' => 'required',
            // 'local_government_id' => 'required',
             'password' => 'required',

        ];
    }
}
