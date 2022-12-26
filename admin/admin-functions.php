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
        redirect_with_message("category.php", "Category Added Successfully");
    }else{
        redirect_with_message("add-category.php", "Something went wrong");
    }

}else if(isset($_POST['edit_category_btn'])){
    $category_id    = $_POST['category_id'];
    $name           = $_POST['name'];
    $slug           = $_POST['slug'];
    $desc           = $_POST['description'];
    $meta_title     = $_POST['meta_title'];
    $meta_desc      = $_POST['meta_desc'];
    $meta_keywords  = $_POST['meta_keywords'];
    $status         = isset($_POST['status']) ? '1' : '0';
    $popular        = isset($_POST['popular']) ? '1' : '0';

    $new_image      = $_FILES['image']['name'];
    $old_image      = $_POST['old_image'];

    if($new_image !=''){
        $update_file_name = $new_image;
    }else{
        $update_file_name = $old_image;
    }
    $path           = "../uploads";

    $update_query = "UPDATE categories SET name='$name', slug='$slug', description='$desc', meta_title='$meta_title', meta_description='$meta_desc', meta_keywords='$meta_keywords',status='$status', popular='$popular', image='$update_file_name' WHERE id='$category_id'";

    $update_query_run = mysqli_query($db_connect, $update_query);

    if($update_query_run){
        if($new_image != ''){
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$new_image);
            if(file_exists('../uploads/'.$old_image)){
                unlink('../uploads/'.$old_image);
            }
        }
        redirect_with_message('edit-category.php?id='.$category_id, 'Categroy update successfully');
    }
}else if(isset($_POST['category_delete_btn'])){
    $category_id    = mysqli_real_escape_string($db_connect, $_POST['category_id']);

    $image_query    = "SELECT * FROM categories WHERE id='$category_id'";
    $query_result   = mysqli_query($db_connect, $image_query);
    $query_data     = mysqli_fetch_array($query_result);
    $image_name     = $query_data['image'];
    var_dump($image_name);

    $delete_query   = "DELETE FROM categories WHERE id='$category_id'";
    $run_query      = mysqli_query($db_connect, $delete_query);

    if($run_query){
        if(file_exists('../uploads/'.$image_name)){
            unlink('../uploads/'.$image_name);
        }
        redirect_with_message('category.php', 'Categroy deleted successfully');
    }else{
        redirect_with_message('category.php', 'Something went wrong');
    }
}else if(isset($_POST['add_product_btn'])){
    $category_id    = $_POST['category_id'];
    $name           = $_POST['name'];
    $slug           = $_POST['slug'];
    $small_desc     = $_POST['small_desc'];
    $desc           = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price  = $_POST['selling_price'];
    $quantity       = $_POST['qty'];
    $status         = isset($_POST['status']) ? '1' : '0';
    $popular        = isset($_POST['popular']) ? '1' : '0';
    $meta_title     = $_POST['meta_title'];
    $meta_desc      = $_POST['meta_desc'];
    $meta_keywords  = $_POST['meta_keywords'];

    $image          = $_FILES['image']['name'];
    $path           = "../uploads";
    $image_text     = pathinfo($image, PATHINFO_EXTENSION);
    $file_name      = time().'.'.$image_text;

    //if($name != ""){
        $product_query = "INSERT INTO products (category_id, name,slug,small_desc,description,original_price,selling_price,qty,meta_title,meta_desc, meta_keywords,status,trending,image) VALUES('$category_id','$name','$slug','$small_desc','$desc','$original_price','$selling_price','$quantity','$meta_title','$meta_desc','$meta_keywords','$status','$popular','$file_name')";
        $query_result = mysqli_query($db_connect, $product_query);

        if(!$query_result){
            echo("Error description: " . mysqli_error($db_connect));
            die();
        }

        if($query_result){
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$file_name);
            redirect_with_message("add-product.php", "Product Added Successfully");
        }else{
            redirect_with_message("add-product.php", "Something went wrong!");
        }
    // }else{
    //     redirect_with_message("add-product.php", "Required field can't be empty");
    // }
}else if(isset($_POST['product_delete_btn'])){
    $product_id    = mysqli_real_escape_string($db_connect, $_POST['product_id']);

    $image_query    = "SELECT * FROM products WHERE id='$product_id'";
    $query_result   = mysqli_query($db_connect, $image_query);
    $query_data     = mysqli_fetch_array($query_result);
    $image_name     = $query_data['image'];
    //var_dump($image_name);

    $delete_query   = "DELETE FROM products WHERE id='$product_id'";
    $run_query      = mysqli_query($db_connect, $delete_query);

    if($run_query){
        if(file_exists('../uploads/'.$image_name)){
            unlink('../uploads/'.$image_name);
        }
        redirect_with_message('products.php', 'Product deleted successfully');
    }else{
        redirect_with_message('products.php', 'Something went wrong');
    }
}