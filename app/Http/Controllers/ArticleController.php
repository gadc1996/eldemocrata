<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\ArticleDestroyRequest;
use App\Http\Requests\Article\ArticleShowRequest;
use App\Http\Requests\Article\ArticleStoreRequest;
use App\Http\Requests\Article\ArticleUpdateRequest;
use App\Http\Resources\ArticleCollection;
use App\Repositories\ArticleRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class ArticleController extends Controller
{
    public function __construct(ArticleRepository $repository)
    {
       $this->repository = $repository; 
    }

    public function index(): JsonResponse
    {
        $resource = $this->repository->index();
        $response = (new ArticleCollection($resource))->response();
        return $response->setStatusCode(200);
    }

    public function store(ArticleStoreRequest $request): JsonResponse
    {
        $resource = $this->repository->store($request->validated());
        return response()->json($resource, 201);
    }

    public function show(ArticleShowRequest $request): JsonResponse
    {
        $resource = $this->repository->show($request->validated());
        return response()->json($resource, 200);
    }

    public function update(ArticleUpdateRequest $request)
    {
        $resource = $this->repository->update($request->validated());
        return response()->json($resource, 200);
    }

    public function destroy(ArticleDestroyRequest $request): JsonResponse
    {
        $resource = $this->repository->destroy($request->validated());
        return response()->json($resource, 204);
    }
}
