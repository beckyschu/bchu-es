<?php

namespace App\Repositories;

use App\Models\Discovery;
use App\Interfaces\DiscoveryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class DiscoveryRepository implements DiscoveryRepositoryInterface
{
    public function search($query) {
        return Discovery::where('body', 'like', "%{$query}%")
            ->orWhere('tags', 'like', "%{$query}%")
            ->get();
    }
}
