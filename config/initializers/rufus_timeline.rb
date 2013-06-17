require 'rufus/scheduler'
require "#{Rails.root}/lib/file_utility.rb"
scheduler = Rufus::Scheduler.start_new

scheduler.every "10s" do 
  FileUtility.store_file_data
end