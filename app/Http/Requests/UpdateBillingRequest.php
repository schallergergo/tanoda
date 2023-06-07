<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBillingRequest extends FormRequest
{
     
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"=>["required","string",'max:255'],
            "country"=>["required","string",'max:255'],
            "postcode"=>["required","string",'max:255'],
            "city"=>["required","string",'max:255'],
            "street"=>["required","string",'max:255'],
            "house_no"=>["required","string",'max:255'],
            "vat_no"=>["required","string",'max:255'],
        ];
    }

    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json([

            'status'   => 400,

            'message'   => __('Validation errors'),

            'data'      => $validator->errors()

        ]));

    }
}


