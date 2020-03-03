<?php

namespace App\Services\AmalSholeh;

use Illuminate\Support\Collection;

class AmalSholeh
{
    public function getStat(): Collection
    {
        $data = [
            "total_donatur" => 386,
            "total_campaign" => 67,
        ];

        return collect($data);
    }
}
