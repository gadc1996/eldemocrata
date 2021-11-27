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
        $article = $this->model->create($data);
        return $article;
    }

    public function destroy(array $data)
    {
        $article = $this->model->find($data['id']);
        $article->delete();
        return $article;
    }
}
