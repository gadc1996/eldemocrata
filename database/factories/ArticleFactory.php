<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $title = $this->faker->realText(50);
    $paragraphs = $this->faker->paragraphs(rand(2, 6));
    $post = "<h1>{$title}</h1>";
    foreach ($paragraphs as $para) {
        $post .= "<p>{$para}</p>";
    }
    return [
        'title' => $title,
        'content' => $post,
    ];
});
