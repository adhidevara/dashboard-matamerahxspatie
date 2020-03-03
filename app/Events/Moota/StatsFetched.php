<?php

namespace App\Events\Moota;

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
