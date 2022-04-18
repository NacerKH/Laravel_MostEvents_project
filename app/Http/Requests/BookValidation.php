<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookValidation extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nb_person' => "required|integer",
            'date' => "required|after_or_equal:now",
           'from' => "nullable|before:to",
            'to' => "nullable|after:from"
        
            //
        ];
    }
}
