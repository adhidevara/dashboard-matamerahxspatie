<?php

namespace App\Services\Trello;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class TrelloServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(TrelloApi::class, function () {
            return new TrelloApi(
                new Client([
                    'base_uri' => 'https://api.trello.com/1/',
                    'query' =>
                        [
                            'key' => config('services.trello.api-key'),
                            'token' => config('services.trello.token')
                        ]
                ])
            );
        });
    }
}
