class Transcribe < ActiveRecord::Base
  attr_accessible :caller_location, :caller_name, :language, :transcription_text, :category_ids, :voice_mail_info_id
  has_and_belongs_to_many :categories
  has_one :voice_mail_info
end
