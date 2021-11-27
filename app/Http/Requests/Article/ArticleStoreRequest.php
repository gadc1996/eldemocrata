<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required'],
            'content' => ['required'],
        ];
    }
}
