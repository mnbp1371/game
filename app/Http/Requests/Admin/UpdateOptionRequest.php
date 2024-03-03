<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOptionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'answer' => [
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
        ]);
    }
}
