<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $guarded = [];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function scopeLang($guery, $lang)
    {
        $guery->where('language_id', $lang);
    }
}
