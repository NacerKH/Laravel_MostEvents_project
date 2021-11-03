<?php

namespace App\Http\Requests;
use App\Models\Oner;

use Illuminate\Foundation\Http\FormRequest;

class OwnerValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
       
        return ['name' => "required|string|min:5|max:100",
               'phone' => "required|digits:8|unique:users,id,".$this->user()->id,
             'email' => "required|string|email|max:255|unique:users,id,".$this->user()->id,  
                'adress' => "required",
                'logo' => "nullable|mimes:jpg,jpeg,png|image|max:2048"
    ];
            //
    
    }
}
