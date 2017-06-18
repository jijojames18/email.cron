<?php
$host = 'localhost';
$user = 'username';
$pass = 'password'
$db   = 'dbname';
$conn = mysql_connect($host,$user,$pass);
if (!$conn)
{
    echo 'Cannot Find Database';
}
else
{
    $db = mysql_select_db($db,$conn);
    if (!$db)
    {
        echo 'Cannot Select Database';
    }
}
?>
