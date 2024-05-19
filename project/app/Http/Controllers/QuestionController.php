<?php

namespace App\Http\Controllers;

use App\DTO\QuestionDTO;
use App\Http\Requests\Admin\Questions\QuestionStoreRequest;
use App\Http\Requests\Admin\Questions\QuestionUpdateRequest;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\QuestionRowResource;
use App\Services\QuestionService;
use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
    public function __construct(
        private QuestionService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(
            QuestionRowResource::collection(
                $this->service->getAllQuestions()
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): JsonResponse
    {
        return response()->json($this->service->getQuestionForm());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionStoreRequest $request): JsonResponse
    {
        $this->service->createQuestion(
            new QuestionDTO($request->validated()['text'])
        );

        return response()->json(status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return response()->json(
            new QuestionResource(
                $this->service->getQuestionById($id)
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): JsonResponse
    {
        return response()->json($this->service->getQuestionFormById($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionUpdateRequest $request, string $id): JsonResponse
    {
        $this->service->updateQuestionById($id, new QuestionDTO($request->validated()['text']));
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $this->service->deleteQuestionById($id);
        return response()->json(status: 204);
    }
}
