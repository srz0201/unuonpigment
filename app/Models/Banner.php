<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['name',
        'title',
        'url',
        'image_path',
        'status', ];
}
