<?php

require_once('../source_functions.php');

/* get action from vawhack.a by id */
function getAById($id)
{
    $query = 'SELECT * FROM a WHERE id = ' . $id;
    $rval = mq($query);
    
    return $rval;
}
?>