<?php

namespace App\Http\Requests\Portfolio;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class LogoRequest extends FormRequest
{
   public function rules()
    {
        return [
             "logo"=> ["required","file","image",'mimes:jpeg,png,jpg'],
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
