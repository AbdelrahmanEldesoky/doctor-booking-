<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class DoctorRegisterRequest extends FormRequest
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
            'name' => 'required|min:4',
            'phone' => 'required',
            'city' => 'required',
            'area' => 'required',
            'gender' => 'required',
            'file' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'email' => 'required|email|unique:users',
        ];
    }

  
}
