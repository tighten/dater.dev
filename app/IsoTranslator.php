<?php

namespace App;

/*
 * https://github.com/edforshaw/strftimer.com/blob/master/models/iso_translator.rb
 */
class IsoTranslator
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function translation()
    {
        return "iso translated version of ({$this->query})";
    }
}
