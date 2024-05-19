<?php

namespace App\Http\Controllers;

use App\DTO\AnswerDTO;
use App\Http\Requests\Admin\Answers\AnswerStoreRequest;
use App\Http\Requests\Admin\Answers\AnswerUpdateRequest;
use App\Http\Resources\AnswerRowResource;
use App\Http\Resources\FullAnswerResource;
use App\Services\AnswerService;
use Illuminate\Http\JsonResponse;

class AnswerController extends Controller
{
    public function __construct(
        private AnswerService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(
            AnswerRowResource::collection(
                $this->service->getAllAnswers()
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): JsonResponse
    {
        return response()->json($this->service->getAnswerForm());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnswerStoreRequest $request): JsonResponse
    {
        $answerData = $request->validated();
        $this->service->createAnswer(
            new AnswerDTO(
                $answerData['text'],
                $answerData['question_id'],
                $answerData['result_id']
            )
        );

        return response()->json(status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return response()->json(
            new FullAnswerResource(
                $this->service->getAnswerById($id)
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): JsonResponse
    {
        return response()->json($this->service->getAnswerFormById($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnswerUpdateRequest $request, string $id): JsonResponse
    {
        $answerData = $request->validated();
        $this->service->updateAnswerById($id, new AnswerDTO(
                $answerData['text'],
                $answerData['question_id'],
                $answerData['result_id']
            )
        );
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $this->service->deleteAnswerById($id);
        return response()->json(status: 204);
    }
}
