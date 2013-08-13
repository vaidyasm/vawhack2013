module FileUtility
  extend self
  def store_file_data
    file_path = "#{Rails.root}/public/audios/nfsshare/audiofiles/"
    text_files = Dir.glob("#{file_path}*.txt")
    text_files.each do |file|
      begin
        record = VoiceMailInfo.create(file_parser(file))
      rescue => e
        puts e
        record = false
      ensure
        File.delete(file) if record 
      end
    end
  end

  def file_parser(file_path)
    filename = File.basename(file_path).gsub(/txt/,"wav")
    required_field = {filename: filename}
    File.open(file_path, "r").each_line do |line|
      identifer, value = line.split("=")
      required_field[identifer.to_sym] = value if ['callerid', 'origdate'].include?(identifer)
    end
    required_field
  end
end