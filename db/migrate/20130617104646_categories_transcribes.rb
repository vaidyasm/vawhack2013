class CategoriesTranscribes < ActiveRecord::Migration
  def up
    create_table :categories_transcribes, :id => false  do |t|
      t.references :category, :null => false
      t.references :transcribe, :null => false
    end
  end

  def down
     drop_table :categories_transcribes
  end
end
