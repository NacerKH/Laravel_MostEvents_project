<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventValidation extends FormRequest
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
            'picture' => 'image|mimes:jpeg,png,jpg|max:2048',
            "name" => "required|string|min:5|max:100",
            "price" => "required|integer|max:100",
            'date' => "required|after_or_equal:now",
            'from' => "nullable|before:to",
             'to' => "nullable|after:from"
       ];
    }
    public function messages()
    {

        return [
            'date.after_or_equal' => __('messages.after_or_equal_now'),
            'date.required' => __('messages.required'),
            'from.before' => __('messages.before_to'),
            'to.after'=> __('messages.after_from'),
            'price.required'=> __('messages.required'),
            'price.integer'=> __('messages.integer_price'),
            'price.max'=> __('messages.max'),

          

        ];
    }
}
