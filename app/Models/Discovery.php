<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discovery extends Model
{
    protected $fillable = ['title', 'url', 'keyword'];
    protected $casts = [
        'keyword' => 'json',
    ];
}
