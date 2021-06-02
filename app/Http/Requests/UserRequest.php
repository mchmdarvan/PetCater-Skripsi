<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'string',
            'email' => 'string|email|unique:users',
            'address_one' => 'string',
            'address_two' => 'string',
            'provinces_id' => 'integer|exists:provinces,id',
            'regencies_id' => 'integer|exists:regencies,id',
            'zipcode' => 'integer|max:5',
            'phone_number' => 'string|max:13',
        ];
    }
}
