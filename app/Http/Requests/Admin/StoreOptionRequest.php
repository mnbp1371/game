<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreOptionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'question_id' => [
                'required',
                'exists:questions,id',
            ],
            'answer' => [
                'required',
                'string:256',
            ],
            'is_correct' => [
                'sometimes',
            ],
        ];
    }

    protected function passedValidation()
    {
        $this->replace([
            'is_correct' => $this->has('is_correct'),
            'answer' => $this->input('answer'),
            'question_id' => $this->input('question_id'),
        ]);
    }
}
