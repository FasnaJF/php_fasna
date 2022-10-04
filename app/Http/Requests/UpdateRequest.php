<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:representatives,email,' . $this->id . ',id',
            'telephone' => 'required|string|max:255',
            'current_route' => 'required|string|max:255',
            'joined_date' => 'required|date',
            'comments' => 'max:1024',
        ];
    }
}
