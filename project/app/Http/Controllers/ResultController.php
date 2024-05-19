<?php

namespace App\Http\Controllers;

use App\DTO\ResultDTO;
use App\Http\Requests\Admin\Result\ResultStoreRequest;
use App\Http\Requests\Admin\Result\ResultUpdateRequest;
use App\Http\Resources\ResultResource;
use App\Http\Resources\ResultRowResource;
use App\Services\ResultService;
use Illuminate\Http\JsonResponse;

class ResultController extends Controller
{
    public function __construct(
        private ResultService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(
            ResultRowResource::collection(
                $this->service->getAllResults()
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): JsonResponse
    {
        return response()->json($this->service->getResultForm());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResultStoreRequest $request): JsonResponse
    {
        $this->service->createResult(
            new ResultDTO($request->validated()['header'], @$request->validated()['text'])
        );

        return response()->json(status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return response()->json(
            new ResultResource(
                $this->service->getResultById($id)
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): JsonResponse
    {
        return response()->json($this->service->getResultFormById($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResultUpdateRequest $request, string $id): JsonResponse
    {
        $resultData = $request->validated();
        $this->service->updateResultById($id, new ResultDTO($resultData['header'], @$resultData['text']));
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $this->service->deleteResultById($id);
        return response()->json(status: 204);
    }
}
