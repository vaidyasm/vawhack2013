class VoiceMailInfosController < ApplicationController
  before_filter :authenticate_user!
  
  def index
    @audios = VoiceMailInfo.all
  end

  def show
    audio = VoiceMailInfo.find(params[:id])
    @audio_path = "nfsshare/audiofiles/#{audio.filename}"
    @transcribe = Transcribe.new
  end
end