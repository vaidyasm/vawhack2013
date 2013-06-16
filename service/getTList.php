<?php

require_once('../source_functions.php');

/* get transcriptions list from vawhack.t */
function getTList()
{
    $query = 'SELECT * FROM t';
    $rval = mq($query);
    
    return $rval;
}
?>