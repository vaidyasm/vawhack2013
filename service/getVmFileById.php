<?php
require_once("../source_functions.php");

$vmf_id = $_GET["vmfid"];
$vmf = getVmfById($vmf_id);
$file = $vmf["afn"];
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: audio/wav');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
}
?>
