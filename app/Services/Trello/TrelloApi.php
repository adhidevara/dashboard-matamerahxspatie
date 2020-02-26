<?php

namespace App\Services\Trello;

use App\Services\Trello\DataTransferObjects\Members;
use App\Services\Trello\DataTransferObjects\Cards;
use GuzzleHttp\Client;
use Illuminate\Support\Carbon;
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

    public function getMember(): Collection
    {
        $response = $this->client->get('boards/'.config('services.trello.board_id').'/members');

        $members = json_decode($response->getBody(), true);

        return collect($members)
            ->map(function (array $attributes) {
                return Members::fromTrelloAttributes($attributes);
            });
    }

    public function getCard(array $name): Collection
    {
        $id_member = $this->getMember()->keyBy('name');

        $id_member = collect($name)
            ->map(function (string $name) use ($id_member) {
                return $id_member->get($name);
            });

        $response = $this->client->get('members/'.$id_member[0]->id.'/cards');
        $cards = json_decode($response->getBody(), true);

        return collect($cards)
            ->map(function (array $attributes) {
                return Cards::fromTrelloAttributes($attributes);
            });
    }
}
