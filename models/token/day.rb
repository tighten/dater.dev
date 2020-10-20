module Token
  class Day
    include Token::Base

    def translation
      case value.length
      when 1
        "j"
      when 2
        "d"
      end
    end

    def date_group
      :day
    end
  end
end
