<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Message extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'message_content' => 'required|string',
        ];
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'message_content.required' => __('Message content is required field'),
        ];
    }
}
