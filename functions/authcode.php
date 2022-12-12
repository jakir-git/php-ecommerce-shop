<?php
session_start();
include('../config/dbcon.php');

if(isset($_POST['register_btn'])){
    $name = mysqli_real_escape_string($db_connect, $_POST['name']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $phone = mysqli_real_escape_string($db_connect, $_POST['phone']);
    $password = mysqli_real_escape_string($db_connect, $_POST['password']);
    $cpassword = mysqli_real_escape_string($db_connect, $_POST['cpassword']);

    //Check if the email is already registered
    $query_email = "SELECT email FROM users WHERE email='$email'";
    $run_email_query = mysqli_query($db_connect, $query_email);
    
    if(mysqli_num_rows($run_email_query) > 0){
        $_SESSION['message'] = "Email already exists";
        header('Location: ../register.php');
    }
    else{
        if($password == $cpassword){
            //Insert query
            $inser_query = "INSERT INTO users(name,email,phone,password) VALUES('$name','$email','$phone','$password')";
            $inser_db   = mysqli_query($db_connect, $inser_query);

            if($inser_db){
                $_SESSION['message'] = "Registered Success";
                header('Location: ../login.php');
            }else{
                $_SESSION['message'] = "Something went problem";
                header('Location: ../register.php');
            }

        }else{
            $_SESSION['message'] = "Password don't match";
            header('Location: ../register.php');
        }
    }

}