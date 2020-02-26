<?php

namespace App\Services\Trello\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Members extends DataTransferObject
{
    /** @var string */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $username;

    public static function fromTrelloAttributes(array $attributes): Members
    {
        return new Members([
            'id' => $attributes['id'],
            'name' => strtolower($attributes['fullName']),
            'username' => strtolower($attributes['username'])
        ]);
    }
}
