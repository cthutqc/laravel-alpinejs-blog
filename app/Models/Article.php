<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'text'];

    public function article_tags():BelongsToMany
    {
        return $this->belongsToMany(ArticleTag::class);
    }

    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getShortenTextAttribute():string
    {
        return \Str::limit($this->attributes['text'], 100, '...');
    }
}
