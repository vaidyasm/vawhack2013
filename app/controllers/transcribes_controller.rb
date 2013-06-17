class TranscribesController < ApplicationController
  before_filter :authenticate_user!
  
  def create
    @transcribe = Transcribe.new(params[:transcribe])
    if @transcribe.save
      render :show, :notice => "The transcription process has been created"
    else
      render :back, :notice => "Unable to save the data"
    end
  end

  def show
    @transcribe = Transcribe.find(params[:id])
  end
end