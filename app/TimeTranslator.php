<?php

namespace App;

/*
 * https://github.com/edforshaw/strftimer.com/blob/master/models/time_translator.rb
 */
class TimeTranslator
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function translation()
    {
        return "time translated version of ({$this->query})";
    }
}
