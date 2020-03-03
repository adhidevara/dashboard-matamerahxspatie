<?php

namespace App\Services\Trello;

use App\Services\Trello\DataTransferObjects\Members;
use App\Services\Trello\DataTransferObjects\Cards;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use function GuzzleHttp\json_decode;

class TrelloApi
{
    /** @var \GuzzleHttp\Client */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getAll(array $names): Collection
    {
        $members = $this->getMember()->keyBy('username');
        $tasks = $this->getLists();

        return collect($names)
            ->map(function (string $name) use ($members) {
                return $members->get($name);
            })
            ->filter()
            ->mapWithKeys(function (Members $members) use ($tasks) {
                return [
                    $members->username => $tasks
                        ->where('person_id', $members->id)
                        ->values()
                        ->map->toArray(),
                ];
            });
    }

    public function getMember(): Collection
    {
        $response = $this->client->get('boards/'.config('services.trello.board_id').'/members');
        $members = json_decode($response->getBody(), true);

        return collect($members)
            ->map(function (array $attributes) {
                return Members::fromTrelloAttributes($attributes);
            });
    }

    public function getLists(): Collection
    {
        $response = $this->client->get('lists/'.config('services.trello.list_id').'/cards');
        $lists = json_decode($response->getBody(), true);

        return collect($lists)
            ->map(function (array $attributes) {
                return Cards::fromTrelloAttributes($attributes);
            });
    }
}
