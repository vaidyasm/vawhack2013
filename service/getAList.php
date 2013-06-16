<?php

require_once('../source_functions.php');

/* get actions list from vawhack.a */
function getAList()
{
    $query = 'SELECT * FROM a';
    $rval = mq($query);
    
    return $rval;
}
?>