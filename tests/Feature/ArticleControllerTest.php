<?php

namespace Tests\Feature;

use App\Article;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;

    private $jsonStructure = [
        'data',
        'links',
        'meta',
    ];

    public function testUserCanIndexArticles(): void
    {
        $this->get('/api/articles/')
             ->assertOk()
             ->assertHeader('Content-Type', 'application/json')
             ->assertJsonStructure($this->jsonStructure);
    }

    public function testUserCanCreateArticle(): void
    {
        $factory = factory(Article::class)->make()->toArray();
        $this->post('/api/articles/', $factory)
             ->assertCreated()
             ->assertHeader('Content-Type', 'application/json');
        
         $this->assertDatabaseHas('articles', [
             'title' => $factory['title'],
             'content' => $factory['content']
         ]);
    }

    public function testUserCanDeleteArticle(): void
    {
        $article = factory(Article::class)->create();
        $this->delete(("api/articles/{$article->id}"));
        $this->assertDatabaseMissing('articles', [
            'title' => $article->title,
        ]);

    }

}
