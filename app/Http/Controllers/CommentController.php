<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'body' => 'required',
        ]);

        Comment::create($request->only('subject', 'body', 'article_id'));

        return response()->json(['success' => true]);
    }
}
