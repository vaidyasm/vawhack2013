<?php

require_once('../source_functions.php');

/* get voicemail from vawhack.vmf by id */
function getVmfById($id)
{
    $query = 'SELECT * FROM vmf WHERE id = ' . $id;
    $rval = mq($query);
    
    return $rval;
}
?>