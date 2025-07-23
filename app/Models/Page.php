<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = (['id']);

    protected $casts = [
        'faq' => 'array',
    ];

    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug',
            ],
        ];
    }

    public function path()
    {
        return url("/service/{$this->slug}");
    }

    public function scopeLang($guery, $lang)
    {
        $guery->where('language_id', $lang);
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function gallery()
    {
        return $this->morphMany(Gallery::class, 'galleryable');
    }
}
