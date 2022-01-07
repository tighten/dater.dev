<?php

namespace App;

use App\Token\Time;

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
        return (new Time($this->query))->translation();
    }
}
