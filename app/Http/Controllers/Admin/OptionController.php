<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repository\OptionRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOptionRequest;
use App\Http\Requests\Admin\UpdateOptionRequest;
use Illuminate\Http\RedirectResponse;

class OptionController extends Controller
{
    public function __construct(
        private readonly OptionRepository $optionRepository
    )
    {
    }

    public function store(StoreOptionRequest $request): RedirectResponse
    {
        $option = $this->optionRepository->create($request->toArray());

        return redirect()->route('admin.questions.show', [
            'question' => $option->question_id,
        ]);
    }

    public function update(string $id, UpdateOptionRequest $request): RedirectResponse
    {
        $option = $this->optionRepository->update($request->toArray(), $id);

        return redirect()->route('admin.questions.show', [
            'question' => $option->question_id,
        ]);
    }
}
