<?php

namespace App;

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

    public function timeZones()
    {
        return ['@todo'];
    }
}
