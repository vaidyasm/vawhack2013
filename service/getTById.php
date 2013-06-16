<?php

require_once('../source_functions.php');

/* get transcription from vawhack.t by id */
function getTById($id)
{
    $query = 'SELECT * FROM t WHERE id = ' . $id;
    $rval = mq($query);
    
    return $rval;
}
?>