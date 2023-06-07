<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreTeamRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
            "company_name"=>['required',"string",'max:255'],
            "school_name"=>['required',"string",'max:255'],
            "school_address"=>['required',"string",'max:255'],
            "scope_of_activities"=>['required',"string",'max:255'],
            "available_in_hungarian"=>['required',"boolean"],
            "available_in_english"=>['required',"boolean"],
            "available_in_german"=>['required',"boolean"],

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



