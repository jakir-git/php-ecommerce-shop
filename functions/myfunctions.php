<?php

function redirect_with_message($url, $message){
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

?>