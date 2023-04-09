<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTag;

class ArticleTagController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ArticleTag $articleTag)
    {
        $articles = Article::whereHas('article_tags', function ($q) use($articleTag){
            $q->where('slug', $articleTag->slug);
        })->orderByDesc('created_at')->paginate(10);

        return view('article_tags.show', compact('articles', 'articleTag'));
    }
}
