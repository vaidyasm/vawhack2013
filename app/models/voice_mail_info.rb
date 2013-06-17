class VoiceMailInfo < ActiveRecord::Base
  attr_accessible :caller_id, :calltime, :filename
end
