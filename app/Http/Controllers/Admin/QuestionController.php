<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repository\QuestionRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreQuestionRequest;
use App\Http\Requests\Admin\UpdateQuestionRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class QuestionController extends Controller
{
    public function __construct(
        private readonly QuestionRepository $questionRepository
    )
    {
    }

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.question.index')->with([
            'questions' => $this->questionRepository->all()
        ]);
    }

    public function show(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.question.show')->with([
            'question' => $this->questionRepository->find(
                id: $id,
                with: ['options']
            )
        ]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.question.create');
    }

    public function store(StoreQuestionRequest $request): RedirectResponse
    {
        $question = $this->questionRepository->create($request->validated());

        return redirect()->route('admin.questions.show', [
            'question' => $question->id,
        ]);
    }


    public function edit(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.question.edit')->with([
            'question' => $this->questionRepository->find(
                id: $id,
                with: ['options']
            )
        ]);
    }

    public function update(string $id, UpdateQuestionRequest $request): RedirectResponse
    {
        $question = $this->questionRepository->update(
            data: $request->validated(),
            id: $id
        );

        return redirect()->route('admin.questions.show', [
            'question' => $question->id,
        ]);
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->questionRepository->delete($id);

        return redirect()->back();
    }
}
