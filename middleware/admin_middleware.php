<?php
include('../functions/myfunctions.php');

if(isset($_SESSION['auth'])){
    if($_SESSION['auth_user']['user_role'] != 1){
        redirect_with_message("../index.php", "You are not authorized to access this page");
    }
}else{
    redirect_with_message("../login.php", "Please Login to continue");
}