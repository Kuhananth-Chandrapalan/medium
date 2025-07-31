<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'title',
        'slug',
        'content',
        'category_id',
        'user_id',
        'published_at',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function readTime($wordsPerMinute = 100): int
    {
        $wordCount =str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / $wordsPerMinute);

        return max(1, $minutes);
    }

    public function imageUrl()
    {
        if ($this->image){
            return Storage::url($this->image);

        }
        return null;

    }
}
