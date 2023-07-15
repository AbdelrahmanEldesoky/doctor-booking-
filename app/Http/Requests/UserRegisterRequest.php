<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
        return
            [
                'name' => ['required', 'string', 'max:255', 'min:3'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'min:6','confirmed'],
                'phone' => ['required']
            ];
    }

    public function messages()
    {
        return

            [
                'name.required' => trans('second_login.name.required'),
                'name.string' => trans('second_login.name.string'),
                'name.max' => trans('second_login.name.max'),
                'name.min' => trans('second_login.name.min'),

                'email.required' => trans('second_login.email.required'),
                'email.string' => trans('second_login.email.string'),
                'email.email' => trans('second_login.email.email'),
                'email.max' => trans('second_login.email.max'),
                'email.unique' => trans('second_login.email.unique'),

                'password.required' => trans('second_login.password.required'),
                'password.min' => trans('second_login.password.min'),
                'password.confirmed' => trans('second_login.password.confirmed'),

                'phone.required' => trans('second_login.phone.required'),
            ];
    }
}
