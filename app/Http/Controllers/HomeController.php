<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request):View
    {
        $articles = Article::query()
            ->take(6)
            ->orderByDesc('created_at')
            ->get();

        return view('home', compact('articles'));
    }
}
