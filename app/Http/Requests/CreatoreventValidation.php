<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatoreventValidation extends FormRequest
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
            'phone' => "required|digits:8|unique:users,id,".$this->user()->id,
            'email' => "required|string|email|max:255|unique:users,id,".$this->user()->id,
                'adress' => "required",
                'picture' => "nullable|mimes:jpg,jpeg,png|image|max:2048"
            //
        ];
    }
    public function messages()
    {

        return [
            'phone.unique' => __('messages.unique'),
            'phone.required' => __('messages.required'),
            'phone.digits' => __('messages.digits'),
            'adress.required'=> __('messages.requied'),
            'picture.mimes'=> __('messages.mimes'),
            'picture.image'=> __('messages.image'),
            'max.max'=> __('messages.max'),

          

        ];
    }
}
