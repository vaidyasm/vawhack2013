class Category < ActiveRecord::Base
  attr_accessible :description, :parent, :title

  has_and_belongs_to_many :transcribes
  validates_uniqueness_of :title

  def to_s
    title
  end
end
