<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface DiscoveryRepositoryInterface
{
    public function search($query);
}
