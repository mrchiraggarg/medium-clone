<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'image',
        'title',
        'slug',
        'content',
        'category_id',
        'published_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function claps()
    {
        return $this->hasMany(Clap::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function readTime($wordsPerMinute = 100)
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / $wordsPerMinute);

        return $minutes;
    }

    public function imageUrl()
    {
        if ($this->image)
            return Storage::url($this->image);

        return null;
    }
}
