<?php

namespace App;

use App\Token\Date;

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
        return new Date($this->query)->translation();
    }
}
