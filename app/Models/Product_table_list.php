<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_table_list extends Model
{
    protected static function booted()
    {
        static::addGlobalScope('ancient', function (Builder $builder) {
            $builder->orderBy('id', 'ASC');
        });
    }

    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'items' => 'array',
    ];
}
