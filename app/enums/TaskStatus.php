<?php

namespace app\enums;

final class TaskStatus
{
    const PLANNING = 1;
    const DOING    = 2;
    const COMPLETE = 3;

    public static function getStatusName()
    {
        return [
            self::PLANNING => 'Planning',
            self::DOING    => 'Doing',
            self::COMPLETE => 'Complete',
        ];
    }
}