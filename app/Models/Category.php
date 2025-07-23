<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public $timestamps = true;

    protected $guarded = ['id'];

    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    protected $casts = [
        'faq' => 'array',
    ];

    public function path()
    {
        return "/category/$this->slug";
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function scopeLang($guery, $lang)
    {
        $guery->where('language_id', $lang);
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    public function getSubCategories()
    {
        $ids = [];
        foreach ($this->subCategories as $tree_item) {
            array_push($ids, $tree_item->id);
            if ($tree_item->subCategories()->exists()) {
                $ids = array_merge($ids, $tree_item->getSubCategories());
            }
        }

        return $ids;
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
