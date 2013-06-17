module FileUtility
  extends self
  def store_file_data
    file_path = "#{Rails.root}/public/nfsshare/audiofiles/"
    text_files = Dir.glob("#{file_path}*.txt")
    text_files.each do |file|
      begin
        VoiceMailInfo.create(file_parser(file))
      rescue
        true
      end
    end
  end

  def file_parser(file_path)
    filename = File.basename(file_path).gsub(/txt/,"wav")
    required_field = {filename: filename}
    File.open(file_path, "r").each_line do |line|
      identifer, value = line.split("=")
      required_field[identifer.to_sym] = value if identifer == callerid || identifer == origtime
    end
    required_field
  end
end