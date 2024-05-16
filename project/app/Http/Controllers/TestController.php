<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestResultRequest;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\ResultResource;
use App\Services\TestService;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    private TestService $service;

    public function __construct()
    {
        $this->service = new TestService();
    }

    public function getTest(): JsonResponse
    {
        return response()->json(QuestionResource::collection($this->service->getTestQuestions()));
    }

    public function getTestResult(TestResultRequest $request): JsonResponse
    {
        $answersIds = $request->validated()['answers'];
        $result = $this->service->getResultByTestAnswers($answersIds);

        return response()->json(new ResultResource($result));
    }
}
