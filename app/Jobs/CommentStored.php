<?php

namespace App\Jobs;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CommentStored implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $article_id;
    public $subject;
    public $body;
    /**
     * Create a new event instance.
     */
    public function __construct($data) {
        $this->article_id = $data['article_id'];
        $this->subject = $data['subject'];
        $this->body = $data['body'];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Comment::create([
            'subject' => $this->subject,
            'body' => $this->body,
            'article_id' => $this->article_id
        ]);
    }
}
