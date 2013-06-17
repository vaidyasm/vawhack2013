class Transcribe < ActiveRecord::Base
  attr_accessible :caller_location, :caller_name, :language, :transcription_text
end
