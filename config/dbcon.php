<?php

$hostname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'phpecom';

$db_connect = mysqli_connect($hostname, $username, $password, $database);

if(!$db_connect){
    die('Connection Failed'.mysqli_error());
}else{
    echo 'Connect Successfully';
}
