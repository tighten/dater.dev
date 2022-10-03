<?php

namespace App\Token;

use App\Constants;

class Date
{
    // @todo import token.base and token.composite, whatever they do

    public const ORDINAL_DAY_REGEXP = '/\b\d{1,2}(?:st|nd|rd|th)\b/';
    public const TWO_DIGIT_LEADING_ZERO_REGEXP = '/\b0\d\b/';
    public const ONE_OR_TWO_DIGIT_REGEXP = '/\b\d{1,2}\b/';
    public const TWO_DIGIT_YEAR_REGEXP = '/\b\d{2}\b/';
    public const FOUR_DIGIT_YEAR_REGEXP = '/\b[1-9]\d{3}\b/';
    public const EIGHT_DIGIT_REGEXP = '/\b\d{8}\b/';

    private $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public static function dayWordsRegexp()
    {
        return '/(' . implode('|', Constants::dayWords()) . ')/i';
    }

    public static function dayWordsAbbrRegexp()
    {
        return '/(' . implode('|', Constants::dayWordsAbbr()) . ')/i';
    }

    public static function monthWordsRegexp()
    {
        return '/(' . implode('|', Constants::monthWords()) . ')/i';
    }

    public static function monthWordsAbbrRegexp()
    {
        return '/(' . implode('|', Constants::monthWordsAbbr()) . ')/i';
    }

    public function translation()
    {
        $output = preg_replace(self::monthWordsRegexp(), 'F', $this->query);
        $output = preg_replace(self::monthWordsAbbrRegexp(), 'M', $output);
        $output = preg_replace(self::dayWordsRegexp(), 'l', $output);
        $output = preg_replace(self::dayWordsAbbrRegexp(), 'D', $output);
        $output = preg_replace(self::TWO_DIGIT_LEADING_ZERO_REGEXP, 'd', $output);
        $output = preg_replace(self::ONE_OR_TWO_DIGIT_REGEXP, 'j', $output);
        $output = preg_replace(self::FOUR_DIGIT_YEAR_REGEXP, 'Y', $output);
        $output = preg_replace(self::TWO_DIGIT_YEAR_REGEXP, 'y', $output);

        return $output;
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
