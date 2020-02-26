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
//        $startDate = Carbon::parse($attributes['start_date']);
//        $endDate = Carbon::parse($attributes['end_date']);
        $dateLastActivity = Carbon::parse($attributes['dateLastActivity'])->format('d M Y');
//        $project = self::getProjectName($project, $attributes['labels'][0]['name'] ?? '');
//        $name = self::getName();
//        $hours = self::getHours($startDate, $endDate, $attributes['allocation'] ?? 0, $project);
//        $formattedTime = self::formatTime($hours);

        return new Cards([
            'id' => $attributes['id'],
            'name' => $attributes['name'],
            'person_id' => $attributes['idMembers'][0],
//            'start_date' => $startDate,
//            'end_date' => $endDate,
            'dateLastActivity' => $dateLastActivity,
            'hours' => 4,
            'formatted_time' => '4h',
            'project' => $attributes['labels'][0]['name'],
        ]);
    }

//    protected static function getProjectName(string $project, string $name): string
//    {
//        if ($project === 'Time Off') {
//            return 'Verlof';
//        }
//
//        if ($project === 'Open source / Eigen werk' && !empty($name)) {
//            return $name;
//        }
//
//        if ($project === 'Spatie Overhead' && !empty($name)) {
//            return $name;
//        }
//
//        return $project;
//    }
//
//    protected static function getName(string $name, string $project): string
//    {
//        $projectSafeForRegex = str_replace('/', '\/', $project);
//        $name = trim(preg_replace("/^{$projectSafeForRegex}\s+/", '', $name));
//
//        if ($project === $name) {
//            return '';
//        }
//
//        return $name;
//    }
//
//    protected static function getHours(
//        Carbon $startDate,
//        Carbon $endDate,
//        int $allocation,
//        string $project
//    ): int {
//        $days = $endDate->diffInDays($startDate) + 1;
//
//        if ($project === 'Verlof') {
//            return $days * 8;
//        }
//
//        return $allocation / 3600 * $days;
//    }
//
//    protected static function formatTime(int $hours): string
//    {
//        if ($hours < 8) {
//            return "{$hours}h";
//        }
//
//        $days = $hours / 8;
//
//        return "{$days}d";
//    }
}
