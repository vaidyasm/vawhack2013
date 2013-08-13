class CreateVoiceMailInfos < ActiveRecord::Migration
  def change
    create_table :voice_mail_infos do |t|
      t.string :filename
      t.integer :callerid
      t.datetime :origdate

      t.timestamps
    end
  end
end
