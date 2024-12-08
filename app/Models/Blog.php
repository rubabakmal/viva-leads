<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'service_id',

    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
