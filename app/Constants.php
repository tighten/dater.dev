<?php

namespace App;

use DateTime;
use DateTimeZone;

// https://github.com/edforshaw/strftimer.com/blob/master/constants.rb
class Constants
{
    public static function monthWords()
    {
        $monthWords = [];

        for ($month = 1; $month <= 12; $month++) {
            $monthWords[] = date('F', mktime(0, 0, 0, $month, 1));
        }

        return $monthWords;
    }

    public static function monthWordsAbbr()
    {
        $monthWords = [];

        for ($month = 1; $month <= 12; $month++) {
            $monthWords[] = date('M', mktime(0, 0, 0, $month, 1));
        }

        return $monthWords;
    }

    public static function dayWords()
    {
        $dayWords = [];

        for ($day = 1; $day <= 7; $day++) {
            $dayWords[] = date('l', mktime(0, 0, 0, 0, $day));
        }

        return $dayWords;
    }

    public static function dayWordsAbbr()
    {
        $dayWords = [];

        for ($day = 1; $day <= 7; $day++) {
            $dayWords[] = date('D', mktime(0, 0, 0, 0, $day));
        }

        return $dayWords;
    }

    public static function timezonesAbbr()
    {
        // @todo this doesn't return all timezones
        // https://randomdrake.com/2008/08/06/time-zone-abbreviation-difficulties-with-php/
        $timezones = timezone_identifiers_list();
        $abbreviations = [];

        $dateTime = new DateTime;
        foreach ($timezones as $timezone) {
            $dateTime->setTimeZone(new DateTimeZone($timezone));
            $abbr = $dateTime->format('T');
            if (! in_array($abbr, $abbreviations) && preg_match('/^\w+/', $abbr)) {
                $abbreviations[] = $abbr;
            }
        }

        return $abbreviations;

        // return DateTimeZone::listIdentifiers();
    }
}
