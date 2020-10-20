module Token
  class Meridian
    include Token::Base

    UPPERCASE_REGEXP  = /^(AM|PM)$/
    LOWERCASE_REGEXP  = /^(am|pm)$/

    def translation
      case value
      when UPPERCASE_REGEXP
        "A"
      when LOWERCASE_REGEXP
        "a"
      end
    end
  end
end
