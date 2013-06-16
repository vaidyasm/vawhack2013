<?php

require_once('../source_functions.php');

/* get voicemail files from vawhack.vmf */
function getVmfList()
{
    $query = 'SELECT * FROM vmf';
    $rval = mq($query);
    
    return $rval;
}
?>