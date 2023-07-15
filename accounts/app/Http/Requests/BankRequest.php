<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
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
            'bank_name' => 'required|min:4',
            'branch_name' => 'required|min:4',
            'swift_code' => 'required|min:4',
            'iban' => 'required|min:4',
            'account_name' => 'required|min:4',
            'account_number' => 'required',
            'confirm_account_number' => 'required|same:account_number',
        ];
    }
}
