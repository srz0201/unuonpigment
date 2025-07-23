<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [''];

    public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }

    public function user()
    {
        return User::find($this->user_id);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function response()
    {
        return $this->hasMany(Comment::class, 'comment_id');
    }
}
