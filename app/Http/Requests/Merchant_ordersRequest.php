<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Merchant_ordersRequest extends FormRequest
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
            'to'=>'required',
            'name'=>'required',
            'phone'=>'required|min:11|max:11',
            'description'=>'required',
            'price'=>'required|integer',
            'shipping_rate'=>'required|integer',
            'total'=>'required|integer',
            
        ];
    }
}
