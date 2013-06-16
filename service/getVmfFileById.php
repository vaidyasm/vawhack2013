<?php

require_once('../source_functions.php');


$vmfid = $_GET["vmfid"];

$vmf = getVmfById($vmfid);

$file = $vmf["afn"];

$directory = $GLOBALS["dir"];

$file = $directory . "/" . $file;
var_dump($file);
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: audio/wave');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}


?>