module Token
  class FractionalSecond
    include Token::Base

    def translation
      if value.length == 3
        "v"
      else value.length == 6
        "u"
      end
    end
  end
end
