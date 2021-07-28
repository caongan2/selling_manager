<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'username' => 'required|min:5',
            'password' => 'required|min:5',
            'phone' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Không được để trống',
            'username.min' => 'Tối thiểu 5 kí tự',
            'password.required' => 'Không được để trống',
            'password.min' => 'Tối thiểu 5 kí tự',
            'phone.min' => 'Số điện thoại phải là 10 chữ số',
            'phone.required' => 'Không được để trống',
        ];
    }
}
