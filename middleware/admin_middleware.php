<?php

if(isset($_SESSION['auth'])){
    if($_SESSION['auth_user']['user_role'] != 1){
        $_SESSION['message'] = "You are not authorized to access this page";
        header('Location: ../index.php');
    }
}else{
    $_SESSION['message'] = "Please Login to continue";
    header('Location: ../login.php');
}