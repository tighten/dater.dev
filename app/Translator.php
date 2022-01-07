<?php

namespace App;

/**
 * https://github.com/edforshaw/strftimer.com/blob/master/models/translator.rb
 */
class Translator
{
    protected $query;
    protected $translation;

    public function __construct(string $query)
    {
        $this->query = $query;
    }

    public function valid()
    {
        return $this->query && $this->query != $this->translation();
    }

    public function translation()
    {
        if (! $this->translation) {
            $this->translation = $this->buildTranslation();
        }

        return $this->translation;

        // @todo: Figure out what this means in ruby. Maybe.. setting memoized output on an instance var? Sorry, it's late, not researching right now.
        //     @_translation ||= build_translation
    }

    public function helpMessage()
    {
        // @todo: figure out what this class is doing to extract a message from a translation
        // HelpMessage.new(translation).message
        return 'WIP :-)';
    }

    protected function buildTranslation()
    {
        $output = $this->query;

        // $output = (new IsoTranslator($output))->translation();
        // $output = (new TimeTranslator($output))->translation();
        $output = (new DateTranslator($output))->translation();

        return $output;
    }
}
