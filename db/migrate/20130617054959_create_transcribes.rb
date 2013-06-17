class CreateTranscribes < ActiveRecord::Migration
  def change
    create_table :transcribes do |t|
      t.string :caller_name
      t.string :caller_location
      t.string :language
      t.text :transcription_text

      t.timestamps
    end
  end
end
