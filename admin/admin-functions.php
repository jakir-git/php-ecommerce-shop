<?php
session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');
if(isset($_POST['add_category_btn'])){
    $name           = $_POST['name'];
    $slug           = $_POST['slug'];
    $desc           = $_POST['description'];
    $meta_title     = $_POST['meta_title'];
    $meta_desc      = $_POST['meta_desc'];
    $meta_keywords  = $_POST['meta_keywords'];
    $status         = isset($_POST['status']) ? '1' : '0';
    $popular        = isset($_POST['popular']) ? '1' : '0';

    $image          = $_FILES['image']['name'];
    $path           = "../uploads";
    $image_text     = pathinfo($image, PATHINFO_EXTENSION);
    $file_name      = time().'.'.$image_text;

    //Category query
    $category_query = "INSERT INTO categories(name, slug, description, meta_title, meta_description, meta_keywords, 	status, popular, image) VALUES('$name','$slug','$desc','$meta_title','$meta_desc','$meta_keywords','$status','$popular', '$file_name')";

    $category_query_run = mysqli_query($db_connect, $category_query);
    if(!$category_query_run){
        echo("Error description: " . mysqli_error($db_connect));
    }

    if($category_query_run){
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$file_name);
        redirect_with_message("add-category.php", "Category Added Successfully");
    }else{
        redirect_with_message("add-category.php", "Something went wrong");
    }

}