<?php

namespace App\Console\Components\TeamMember;

use Illuminate\Console\Command;
use App\Services\Trello\TrelloApi;
use App\Events\TeamMember\TasksFetched;

class FetchTasksTrello extends Command
{
    protected $signature = 'dashboard:fetch-tasks-trello';

    protected $description = 'Fetch team members tasks from Trello';

    public function handle(TrelloApi $trello)
    {
        $this->info('Fetching tasks from Trello...');

        $members = $trello->getAll(
            explode(',', config('services.trello.member'))
        );
        event(new TasksFetched($members->toArray()));

        $this->info('All done!');
    }
}
