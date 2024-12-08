<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'service_name',
        'image',
        'expertise',
        'status',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
