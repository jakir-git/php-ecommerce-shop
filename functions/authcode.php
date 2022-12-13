<?php
session_start();
include('../config/dbcon.php');

if(isset($_POST['register_btn'])){
    $name       = mysqli_real_escape_string($db_connect, $_POST['name']);
    $email      = mysqli_real_escape_string($db_connect, $_POST['email']);
    $phone      = mysqli_real_escape_string($db_connect, $_POST['phone']);
    $password   = mysqli_real_escape_string($db_connect, $_POST['password']);
    $cpassword  = mysqli_real_escape_string($db_connect, $_POST['cpassword']);

    //Check if the email is already registered
    $query_email        = "SELECT email FROM users WHERE email='$email'";
    $run_email_query    = mysqli_query($db_connect, $query_email);

    if(mysqli_num_rows($run_email_query) > 0){
        $_SESSION['message'] = "Email already exists";
        header('Location: ../register.php');
    }
    else{
        if($password == $cpassword){
            //Insert query
            $insert_query   = "INSERT INTO users(name,email,phone,password) VALUES('$name','$email','$phone','$password')";
            $inser_db       = mysqli_query($db_connect, $insert_query);

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
else if(isset($_POST['login_btn'])){
    $email      = mysqli_real_escape_string($db_connect, $_POST['email']);
    $password   = mysqli_real_escape_string($db_connect, $_POST['password']);

    $fetch_user     = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $fetch_result   = mysqli_query($db_connect, $fetch_user);
    var_dump($fetch_result);

    if(mysqli_num_rows($fetch_result) > 0 ){

        $_SESSION['auth'] = true;

        $user_data  = mysqli_fetch_array($fetch_result);
        $username   = $user_data['name'];
        $useremail  = $user_data['email'];
        $user_role  = $user_data['role_as'];

        $_SESSION['auth_user'] = [
            'name'      => $username,
            'email'     => $useremail,
            'user_role' => $user_role
        ];

        if($_SESSION['auth_user']['user_role'] == 1){
            $_SESSION['message'] = "Welcome To Dashboard";
            header('Location: ../admin/index.php');
        }else{
            $_SESSION['message'] = "Logged In Successfully";
            header('Location: ../index.php');
        }

    }else{
        $_SESSION['message'] = "Invalid credentials";
        header('Location: ../login.php');
    }

}