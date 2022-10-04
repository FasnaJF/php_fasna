<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:representatives,email',
            'telephone' => 'required|string|max:255',
            'current_route' => 'required|string|max:255',
            'joined_date' => 'required|date',
            'comments' => 'max:1024',
        ];
    }
}
