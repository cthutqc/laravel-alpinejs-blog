<?php

namespace App\Observers;

use App\Models\ArticleTag;
use Illuminate\Support\Str;

class ArticleTagObserver
{
    public function creating(ArticleTag $articleTag): void
    {
        $articleTag->slug = Str::slug($articleTag->name);
    }
}
