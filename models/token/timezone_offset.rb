module Token
  class TimezoneOffset
    include Token::Base

    def translation
      value.include?(":") ? "P" : "O"
    end
  end
end
