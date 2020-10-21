<?php

namespace App\Token;

class Date
{
    // @todo import token.base and token.composite, whatever they do

    const WORD_BOUNDARY_REGEXP = "/\b//";
    const DAY_WORDS_REGEXP = ;
    const ORDINAL_DAY_REGEXP = "/^\d{1,2}(?:st|nd|rd|th)$//";
    const ONE_OR_TWO_DIGIT_REGEXP = "/^\d{1,2}$//"
    const FOUR_DIGIT_YEAR_REGEXP = "/^[1-9]\d{3}$//"
    const EIGHT_DIGIT_REGEXP = "/^\d{8}$//";

    public static function dayWordsRegexp()
    {
        // @todo real join from Constants class
        return "/^(#{Constants::DAY_WORDS.join('|')})$/i";
    }

    public static function timezoneAbbrRegexp()
    {
        // @todo real join from Constants class
        return "/^(#{Constants::TIME_ZONES.join('|')})$//";
    }

    public function translation()
    {

    }

    private function substringArray()
    {
        // @todo
    }

    private function tokenClass($subtring)
    {
        // @todo
    }

/*
    def substring_array
      if value.match?(EIGHT_DIGIT_REGEXP)  # If a series of digits, split manually
        [value[0..3], value[4..5], value[6..7]]
      else
        value.split(WORD_BOUNDARY_REGEXP)
      end
    end

    def token_class(substring)
      case substring
      when MONTH_WORDS_REGEXP
        Token::MonthWord
      when DAY_WORDS_REGEXP
        Token::DayWord
      when FOUR_DIGIT_YEAR_REGEXP
        Token::Year
      when ORDINAL_DAY_REGEXP
        Token::OrdinalDay
      when ONE_OR_TWO_DIGIT_REGEXP
        Token::NumericalDate
      when TIMEZONE_ABBR_REGEXP
        Token::Timezone
      else
        Token::String
      end
*/
}
