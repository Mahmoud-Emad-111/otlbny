<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
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
            'email'=>'unique:delivery',
            'phone'=>'required|unique:deliveries|max:11|min:11',
            'password'=>'required|min:8',
            'type_of_car'=>'required',
            'card_image'=>'required|image',
            'license_image'=>'required|image',
            'image'=>'required|image',
            'vehicle_id'=>'required'
        ];
    }
}
