<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['title', 'url', 'order', 'language_id'];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
