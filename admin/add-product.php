<?php 
  include('includes/header.php');
  include('../middleware/admin_middleware.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card add-category-form">
                <div class="card-header">
                    <h3>Add Product</h3>
                </div>
                <div class="card-body">
                    <form class="form" action="admin-functions.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Select Category</label>
                                <select name="category_id" class="form-select">
                                    <option selected>Select category</option>
                                    <?php 
                                        $categories =  fetch_all_from_db('categories');
                                        if(mysqli_num_rows($categories) > 0){ 
                                            foreach($categories as $item){    
                                        ?>
                                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                            <?php
                                            } 
                                        }else{
                                            echo 'No category found';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" placeholder="Enter category name" name="name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="slug">Slug</label>
                                <input type="text" placeholder="Enter category slug" name="slug" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="description">Small Description</label>
                                <textarea placeholder="Enter Product small description" name="small_desc" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="description">Description</label>
                                <textarea placeholder="Enter Product description" name="description" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="original_price">Original Price</label>
                                <input type="number" placeholder="Original Price" name="original_price" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="selling_price">Selling Price</label>
                                <input type="number" placeholder="Selling Price" name="selling_price" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="status">Quantity</label>
                                    <input type="number" placeholder="Enter Quantity" class="form-control" name="qty">
                                </div>
                                <div class="col-md-3">
                                    <label for="popular">Status</label>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-3">
                                    <label for="popular">Popular</label>
                                    <input type="checkbox" name="popular">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" placeholder="Enter category meta" name="meta_title" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="meta_desc">Meta Description</label>
                                <textarea placeholder="Enter category meta description" name="meta_desc" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="meta_keywords">Meta Keywords</label>
                                <textarea placeholder="Enter category meta description" name="meta_keywords" class="form-control"></textarea>
                            </div>
                               
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Submit</button>
                            </div>                     
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>