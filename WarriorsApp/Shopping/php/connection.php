<?php
$connect =mysqli_connect('localhost','root','','bar warriors');
if(!$connect){
    die("database not connect".mysqli_error());
}

?>