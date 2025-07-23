<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $guarded = (['id']);

    public function scopeLang($guery, $lang)
    {
        $guery->where('language_id', $lang);
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
