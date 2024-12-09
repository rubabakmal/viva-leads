<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'service_id',
        'description',
        'message', // For the textarea field
    ];
}
