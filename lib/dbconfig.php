<?php
$db["host"] = "localhost";
$db["un"] = "root";
$db["pw"] = "vawhack";
$db["dbname"] = "vawhack";
$db["conn"] = mysql_connect($db["host"], $db["un"], $db["pw"]);
$GLOBALS["db"] = $db;

$rval = mysql_select_db($db["dbname"], $db["conn"]);

function mq($query_string)
{
    $rval = array();
    $db = $GLOBALS["db"];
    $result = mysql_query($query_string, $db["conn"]);
    if (!$result)
    {
        die("Invalid Query!");
    }
    else
    {
        $row = mysql_fetch_assoc($result);
        $rval = $row;
    }
    return $rval;
}

function mi($query_string)
{
    $rval = array();
    $db = $GLOBALS["db"];
    $result = mysql_query($query_string, $db["conn"]);
    if (!$result)
    {
        die("Invalid Query!");
    }
    else
    {
        $rval = $result;
    }
    return $rval;
}

?>