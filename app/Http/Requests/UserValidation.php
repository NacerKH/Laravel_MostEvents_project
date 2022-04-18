<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidation extends FormRequest
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
        // dd($this->user()->id);
        return  [
            'firstname' => 'required|string|min:8|max:255',
            'lastname' => 'required|string|min:8|max:255',
            'phone' => "required|digits:8|unique:users,id,".$this->user()->id,
            'email' => "required|string|email|max:255|unique:users,id,".$this->user()->id,
            // 'email' => 'required|string|email|max:255|unique:users,email'.$this->user()->id,
            // 'password' => 'required|string|min:8|confirmed',
        ];
    }
    // //multilanguage
    public function messages()
    {

        return [
            'firstname.min' => __('messages.firstnamesize'),
          

        ];
    }

}
