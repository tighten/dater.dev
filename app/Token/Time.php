<?php

namespace App\Token;

use App\Constants;

class Time
{
    public const MERIDIAN_REGEXP = '/(?:am|pm)\b/';
    public const MERIDIAN_UPPERCASE_REGEXP = '/(?:AM|PM)\b/';
    public const ONE_DIGIT_REGEXP = '/\b\d{1}\b/';
    public const TWO_DIGIT_REGEXP = '/\b\d{2}\b/';
    public const THREE_OR_MORE_DIGIT_REGEXP = '/\b\d{3,}\b/';
    public const SIX_DIGIT_REGEXP = '/\b\d{6}\b/';
    public const MILITARY_TIME_REGEXP = '/\b0\d[0-5]\d\b/';
    public const TIMEZONE_OFFSET_REGEXP = '/\b(?:\+|\-)[01]\d:?\d{2}\b/';

    private $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public static function hoursRegexp()
    {
        return '/(' . implode('|', Constants::dayWords()) . ')/i';
    }

    public static function minutesRegexp()
    {
        return '/(' . implode('|', Constants::monthWords()) . ')/i';
    }

    public static function timezonesAbbrRegexp()
    {
        return '/(' . implode('|', Constants::timezonesAbbr()) . ')/i';
    }

    public function translation()
    {
        $output = preg_replace(self::timezonesAbbrRegexp(), 'T', $this->query);
        $output = preg_replace(self::MERIDIAN_REGEXP, 'a', $output);
        $output = preg_replace(self::MERIDIAN_UPPERCASE_REGEXP, 'A', $output);

        return $output;
    }
}
