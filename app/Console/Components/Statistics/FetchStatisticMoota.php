<?php

namespace App\Console\Components\Statistics;

use App\Events\Moota\StatsFetched;
use App\Services\Moota\Moota;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class FetchStatisticMoota extends Command
{
    protected $signature = 'dashboard:fetch-statistic-moota';

    protected $description = 'Fetch statistic Moota';

    public function handle(Moota $moota)
    {
        $this->info('Fetching tasks from Moota...');

        $stats = $moota->getStat();
        event(new StatsFetched($stats->toArray()));

        $this->info('All done!');
    }
}
