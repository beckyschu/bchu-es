<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discovery extends Model
{

    protected $casts = [
        'tags' => 'json',
    ];
}
