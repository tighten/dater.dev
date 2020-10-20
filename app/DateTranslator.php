<?php

namespace App;

/*
 * https://github.com/edforshaw/strftimer.com/blob/master/models/date_translator.rb
 */
class DateTranslator
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function translation()
    {
        return "date translated version of ({$this->query})";
    }
}
