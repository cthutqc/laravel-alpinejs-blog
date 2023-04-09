<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index():View
    {
        $articles = Article::query()
            ->orderByDesc('created_at')
            ->paginate(10);

        $article_tags = ArticleTag::has('articles')->get();

        return view('articles.index', compact('articles', 'article_tags'));
    }

    public function show(Article $article):View
    {
        $article->increment('views');

        $article->load('article_tags');

        $article->load('comments');

        return view('articles.show', compact('article'));
    }

    public function like(Request $request)
    {
        Article::where('id', $request->only('article_id'))->increment('likes');

        return response()->json([
            'success' => true,
        ]);
    }
}
