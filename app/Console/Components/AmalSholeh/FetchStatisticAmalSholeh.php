<?php

namespace App\Console\Components\AmalSholeh;

use App\Events\AmalSholeh\StatsFetched;
use App\Services\AmalSholeh\AmalSholeh;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class FetchStatisticAmalSholeh extends Command
{
    protected $signature = 'dashboard:fetch-statistic-amal-sholeh';

    protected $description = 'Fetch statistic Amal Sholeh';

    public function handle(AmalSholeh $amalSholeh)
    {
        $this->info('Fetching tasks from Amal Sholeh...');

        $stats = $amalSholeh->getStat();
        event(new StatsFetched($stats->toArray()));

        $this->info('All done!');
    }
}
