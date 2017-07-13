<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface DiscoveryRepositoryInterface
{
    public function search($query);
}
