<?php
    $host = "localhost";
    $user_name = "root";
    $password = "";
    $database_name = "vawhack";
    $db = mysql_connect($host, $user_name, $password);
    if (mysql_error() > ""){ 
        print_r(mysql_error());
    }
    mysql_select_db($database_name, $db);
    
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
        $query = "INSERT INTO vmf(afn, callerid, calltime) values ('".$my_array['filename']."','".$my_array['caller_id']."','".$my_array['origtime']."')";
        print_r($query);
        $qresult = mysql_query($query);
        print_r($my_array);
    }
    

?>
