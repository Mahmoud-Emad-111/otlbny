<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            //
            'from'=>'required',
            'to'=>'required',
            'phone'=>'required|min:11|max:11',
            'image'=>'image',
            'description'=>'required',
            'vehicle_id'=>'required'
        ];
    }
}
