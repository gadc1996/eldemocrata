<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\ArticleStoreRequest;
use App\Http\Resources\ArticleCollection;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    public function __construct(ArticleRepository $repository)
    {
       $this->repository = $repository; 
    }

    public function index()
    {
        $resource = $this->repository->index();
        $response = (new ArticleCollection($resource))->response();
        return $response->setStatusCode(200);
    }

    public function store(ArticleStoreRequest $request)
    {
        $resource = $this->repository->store($request->validated());
        return response()->json($resource, 201);
    }
}
