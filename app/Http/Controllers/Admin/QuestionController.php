<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreQuestionRequest;
use App\Http\Requests\Admin\UpdateQuestionRequest;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        return view('admin.question.index')->with([
            'questions' => Question::query()->paginate()
        ]);
    }

    public function show(string $id)
    {
        return view('admin.question.show')->with([
            'question' => Question::query()->with(['options'])->findOrFail($id)
        ]);
    }

    public function create()
    {
        return view('admin.question.create');
    }

    public function store(StoreQuestionRequest $request)
    {
        $question = Question::query()->create($request->validated());

        return redirect()->route('admin.questions.show', [
            'question' => $question->id,
        ]);
    }


    public function edit(string $id)
    {
        return view('admin.question.edit')->with([
            'question' => Question::query()->with(['options'])->findOrFail($id)
        ]);
    }

    public function update(string $id, UpdateQuestionRequest $request)
    {
        $question = Question::query()
            ->findOrFail($id);

        $question->update($request->validated());
        $question->refresh();

        return redirect()->route('admin.questions.show', [
            'question' => $question->id,
        ]);
    }
}
