<?php

require_once('../source_functions.php');

/* get transcription from vawhack.t by id */
function saveVmf($afn, $callerid, $calltime)
{
    $query = "INSERT INTO vmf(afn, callerid, calltime) values ('" . $afn . "','" . $callerid . "','" . $calltime ."')";
    $rval = mi($query);
    return $rval;
}
?>