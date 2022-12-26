<?php 
  include('includes/header.php');
  include('../middleware/admin_middleware.php');
?>

<div class="container">
    <div class="row">
        <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $products = fetch_by_id_from_db('products', $id);
                if(mysqli_num_rows($products) > 0){
                    $data = mysqli_fetch_array($products);
            ?>
            <div class="col-md-12">
                <div class="card add-category-form">
                    <div class="card-header">
                        <h3>Edit Product</h3>
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
                                                <option <?= $data['category_id'] == $item['id'] ? 'selected' : ''?> value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
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
                                    <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
                                    <input type="text" value="<?= $data['name']; ?>" placeholder="Enter category name" name="name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="slug">Slug</label>
                                    <input type="text" value="<?= $data['slug']; ?>" placeholder="Enter category slug" name="slug" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="description">Small Description</label>
                                    <textarea placeholder="Enter Product small description" name="small_desc" class="form-control"><?= $data['small_desc']; ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="description">Description</label>
                                    <textarea placeholder="Enter Product description" name="description" class="form-control"><?= $data['description']; ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="original_price">Original Price</label>
                                    <input value="<?= $data['original_price']; ?>" type="number" placeholder="Original Price" name="original_price" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="selling_price">Selling Price</label>
                                    <input value="<?= $data['selling_price']; ?>" type="number" placeholder="Selling Price" name="selling_price" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="image">Image</label>
                                    <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                    <input type="file" name="image" class="form-control">
                                    <img width="80" src="../uploads/<?= $data['image'] ?>">
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="status">Quantity</label>
                                        <input value="<?= $data['qty']; ?>" type="number" placeholder="Enter Quantity" class="form-control" name="qty">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="popular">Status</label>
                                        <input type="checkbox" name="status" <?= $data['status'] == '0' ? '':'checked'; ?>>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="popular">Popular</label>
                                        <input type="checkbox" name="popular" <?= $data['status'] == '0' ? '':'checked'; ?>>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" value="<?= $data['meta_title']; ?>" placeholder="Enter category meta" name="meta_title" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="meta_desc">Meta Description</label>
                                    <textarea placeholder="Enter category meta description" name="meta_desc" class="form-control"><?= $data['meta_desc']; ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="meta_keywords">Meta Keywords</label>
                                    <textarea placeholder="Enter category meta description" name="meta_keywords" class="form-control"><?= $data['meta_keywords']; ?></textarea>
                                </div>
                                
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="edit_product_btn">Update</button>
                                </div>                     
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php 
            } else { echo "Product not found for given ID"; }
            } else { echo "Product ID is missing"; }?>
    </div>
</div>

<?php include('includes/footer.php'); ?>