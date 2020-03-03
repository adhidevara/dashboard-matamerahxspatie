<?php

namespace App\Services\Trello\DataTransferObjects;

use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class Cards extends DataTransferObject
{
    /** @var string */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $project;

    /** @var string */
    public $person_id;

//    /** @var \Illuminate\Support\Carbon */
//    public $start_date;
//
//    /** @var \Illuminate\Support\Carbon */
//    public $end_date;

    /** @var string */
    public $dateLastActivity;

    /** @var int */
    public $hours;

    /** @var string */
    public $formatted_time;

    public static function fromTrelloAttributes(array $attributes): Cards
    {
        $dateLastActivity = Carbon::parse($attributes['dateLastActivity'])->format('d M Y');

        return new Cards([
            'id' => $attributes['id'],
            'name' => $attributes['name'],
            'person_id' => $attributes['idMembers'][0],
            'dateLastActivity' => $dateLastActivity,
            'hours' => 4,
            'formatted_time' => '4h',
            'project' => '',
        ]);
    }
}
