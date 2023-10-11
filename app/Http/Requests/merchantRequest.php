<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class merchantRequest extends FormRequest
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
            'company'=>'required',
            'phone'=>'required|unique:merchants|max:11|min:11',
            'extra_phone'=>'unique:merchants|max:11|min:11',
            'national_id'=>'required|integer|min:14',
            'password'=>'required|min:8',
            'address'=>'required',
        ];
    }
}
