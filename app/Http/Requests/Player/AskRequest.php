<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;

class AskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'option_id' => [
                'required',
                'exists:options,id',
            ],
            'question_id'=> [
                'required',
                'exists:questions,id',
            ],
            'game_id'=> [
                'required',
            ],
        ];
    }
}
