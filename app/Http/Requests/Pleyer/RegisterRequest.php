<?php

namespace App\Http\Requests\Pleyer;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string:50',
            ],
            'email' => [
                'required',
                'unique:players,email',
                'email',
            ],
            'password' => [
                'required',
                'string:50',
                'min:8',
            ],
        ];
    }
}
