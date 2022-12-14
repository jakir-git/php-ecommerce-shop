<?php
include('../config/dbcon.php');

function fetch_all_from_db($table_name){
    global $db_connect;
    $query = "SELECT * FROM $table_name";
    $result = mysqli_query($db_connect, $query);
    return $result;
}

function fetch_by_id_from_db($table_name, $id){
    global $db_connect;
    $query = "SELECT * FROM $table_name WHERE id='$id'";
    $result = mysqli_query($db_connect, $query);
    return $result;
}


function redirect_with_message($url, $message){
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

?>