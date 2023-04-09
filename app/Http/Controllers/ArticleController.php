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
        $article->load('article_tags');

        $article->load('comments');

        if(!\Cache::has('likes_' . $article->id))
            \Cache::forever('likes_' . $article->id, $article->likes);

        if(!\Cache::has('views_' . $article->id))
            \Cache::forever('views_' . $article->id, $article->views);

        $article->update([
            'likes' => \Cache::get('likes_' . $article->id),
            'views' => \Cache::get('views_' . $article->id),
        ]);

        return view('articles.show', compact('article'));
    }

    public function like(Request $request)
    {
        return response()->json([
            'likes' => \Cache::increment('likes_' . $request->article_id)
        ]);
    }

    public function view(Request $request)
    {
        return response()->json([
            'views' => \Cache::increment('views_' . $request->article_id)
        ]);
    }
}
