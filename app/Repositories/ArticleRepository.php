<?php 

namespace App\Repositories;

use App\Article;

class ArticleRepository
{
    protected $model;

    public function __construct(Article $article)
    {
        $this->model = $article;
    }

    public function index()
    {
        return $this->model->paginate();
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }
}
