<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use DispatchesJobs;

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'body' => 'required',
        ]);

        $job = (new \App\Jobs\CommentStored([
            'subject' => $request->subject,
            'body' => $request->body,
            'article_id' => $request->article_id,
        ]));

        $this->dispatch($job)->delay(now()->addSeconds(600));

        return response()->json(['success' => true]);
    }
}
