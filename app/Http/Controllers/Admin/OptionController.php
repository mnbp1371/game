<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOptionRequest;
use App\Http\Requests\Admin\StoreQuestionRequest;
use App\Http\Requests\Admin\UpdateOptionRequest;
use App\Http\Requests\Admin\UpdateQuestionRequest;
use App\Models\Option;
use App\Models\Question;

class OptionController extends Controller
{
    public function store(StoreOptionRequest $request)
    {
        $option = Option::query()->create($request->toArray());

        return redirect()->route('admin.questions.show', [
            'question' => $option->question_id,
        ]);
    }

    public function update(string $id, UpdateOptionRequest $request)
    {
        $option = Option::query()
            ->findOrFail($id);

        $option->update($request->toArray());
        $option->refresh();

        return redirect()->route('admin.questions.show', [
            'question' => $option->question_id,
        ]);
    }
}
