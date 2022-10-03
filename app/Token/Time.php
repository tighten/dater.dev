<?php

namespace App\Token;

use App\Constants;

class Time
{
    public const MERIDIAN_REGEXP = '(?:am|pm)\b';
    public const MERIDIAN_UPPERCASE_REGEXP = '(?:AM|PM)\b';
    public const ONE_DIGIT_REGEXP = '/\b\d(\b|' . self::MERIDIAN_REGEXP . ')/i';
    public const TWO_DIGIT_REGEXP = '/\b\d{2}(\b|' . self::MERIDIAN_REGEXP . ')/i';
    public const THREE_OR_MORE_DIGIT_REGEXP = '/\b\d{3,}\b/';
    public const SIX_DIGIT_REGEXP = '/\b\d{6}\b/';
    public const ONE_DIGIT_TIME_WITH_COLON_REGEXP = '/\b\d:\d{2}/';
    public const TWO_DIGIT_TIME_WITH_COLON_REGEXP = '/\b\d{2}:\d{2}/';
    public const TWO_DIGIT_12_HR_TIME_WITH_COLON_REGEXP = '/\b[0-1]\d:\d{2}/';
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
        $output = preg_replace(self::MILITARY_TIME_REGEXP, 'Hi', $output);
        $output = preg_replace(self::SIX_DIGIT_REGEXP, 'u', $output);
        $output = preg_replace(self::TWO_DIGIT_12_HR_TIME_WITH_COLON_REGEXP, 'h:i', $output);
        $output = preg_replace(self::TWO_DIGIT_TIME_WITH_COLON_REGEXP, 'H:i', $output);
        $output = preg_replace(self::ONE_DIGIT_TIME_WITH_COLON_REGEXP, 'g:i', $output);
        $output = preg_replace(self::ONE_DIGIT_REGEXP, 'g$1', $output);
        $output = preg_replace(self::TWO_DIGIT_REGEXP, 'h$1', $output);
        $output = preg_replace('/' . self::MERIDIAN_REGEXP . '/', 'a', $output);
        $output = preg_replace('/' . self::MERIDIAN_UPPERCASE_REGEXP . '/', 'A', $output);

        return $output;
    }
}
