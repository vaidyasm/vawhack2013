class CreateVoiceMailInfos < ActiveRecord::Migration
  def change
    create_table :voice_mail_infos do |t|
      t.string :filename
      t.integer :caller_id
      t.integer :calltime

      t.timestamps
    end
  end
end
