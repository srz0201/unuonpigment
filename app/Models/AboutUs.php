<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $guarded = [];

    protected $casts = [
        'about_items' => 'array',
    ];

    protected $table = 'about_uses';

    public function scopeLang($guery, $lang)
    {
        $guery->where('language_id', $lang);
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
