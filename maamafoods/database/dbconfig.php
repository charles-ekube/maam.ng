<?php

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'maamafoods';

$conn = new mysqli($server,$user,$pass,$db);
if($conn-> connect_error){
    die("Connection Failed".$conn->connect_error);
}
else{
    echo "";
}

?>