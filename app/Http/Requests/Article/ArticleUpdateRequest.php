<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ArticleUpdateRequest extends FormRequest
{
    public function __construct(Request $request)
    {
        $request->request->add([
            'id' => request()->route('article'),
        ]);
    }

    public function rules()
    {
        return [
            'id' => [],
            'title' => [],
            'content' => [],
        ];
    }
}
