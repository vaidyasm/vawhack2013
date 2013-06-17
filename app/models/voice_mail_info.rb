class VoiceMailInfo < ActiveRecord::Base
  attr_accessible :callerid, :origdate, :filename
  belongs_to :transcribe
end
