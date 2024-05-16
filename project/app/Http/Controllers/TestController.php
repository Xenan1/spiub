<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
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
}
