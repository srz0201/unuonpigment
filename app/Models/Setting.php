<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'theme_config' => 'array',
    ];

    public function scopeLang($guery, $lang)
    {
        $guery->where('language_id', $lang);
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
