<?php
    // $directory = "nfsshare/audiofiles/" //directory from where to read file
    $directory = "C:/Users/sus/Desktop/voicemail/device/999/INBOX/";
    // get all text files with a .txt extension.
    $texts = glob($directory . "*.txt");
    
    if(empty($texts)){
        echo "File not present";
        return;
    }
    foreach($texts as $filename){
        $my_array = array();
        $my_array['filename'] = basename($filename, ".txt"); 
        $file = fopen($filename, 'r');
        while(!feof($file)){
            $current_line = trim(fgets($file));
            $each_line = explode("=", $current_line);
            if($each_line[0] == "callerid"){
                $reg = '/<([0-9]+)>$/';
                preg_match($reg, $each_line[1], $matches);
                $my_array['caller_id'] = $matches[1];
            }
            elseif($each_line[0] == "origtime"){
                $my_array['origtime'] = $each_line[1];
            }
        }
        fclose($file);
        print_r($my_array);
    }
    

?>
