<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;

class StoreCompetitionRequest extends FormRequest
{
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ['required',"string",'max:255'],
            "duration_in_days"=>['required',"integer",'max:365 '],
            "registration_fee"=>['required',"integer",'max:1000000 '],
            "registration_start"=>['required',"date_format:Y-m-d H:i:s"],
            "registration_end"=>['required',"date_format:Y-m-d H:i:s"],
            "evaluation_start"=>['required',"date_format:Y-m-d H:i:s"],
            "evaluation_end"=>['required',"date_format:Y-m-d H:i:s"],
            "comment"=>['required',"string"],
            "stand_description_hu"=>['required',"string"],
            "stand_description_en"=>['required',"string"],
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
