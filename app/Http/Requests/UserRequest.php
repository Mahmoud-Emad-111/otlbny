<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'phone'=>'required|unique:users|max:11|min:11',
            'national_id'=>'required|integer|min:14',
            'gender'=>'required|in:male,fmale',
            'email'=>'unique:users',
            'password'=>'required|min:8',
            'confirm_password'=>'required|min:8|same:password',
        ];
    }
}
