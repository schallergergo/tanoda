<?php

namespace App\Http\Requests\Portfolio;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BusinessCardRequest extends FormRequest
{
    public function rules()
    {
        return [
             "business_card"=> ["required","file",'mimes:pdf'],
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
