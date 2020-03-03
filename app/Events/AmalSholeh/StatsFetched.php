<?php

namespace App\Events\AmalSholeh;

use App\Events\DashboardEvent;

class StatsFetched extends DashboardEvent
{
    /** @var int */
    public $stats;

    public function __construct(array $stats)
    {
        $this->stats = $stats;
    }
}
