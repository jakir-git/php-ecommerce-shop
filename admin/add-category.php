<?php 
  include('includes/header.php');
  include('../middleware/admin_middleware.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card add-category-form">
                <div class="card-header">
                    <h3>Add Category</h3>
                </div>
                <div class="card-body">
                    <form class="form" action="admin-functions.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" placeholder="Enter category name" name="name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="slug">Slug</label>
                                <input type="text" placeholder="Enter category slug" name="slug" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="description">Description</label>
                                <textarea placeholder="Enter category description" name="description" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
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
                            <div class="col-md-6">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-6">
                                <label for="popular">Popular</label>
                                <input type="checkbox" name="popular">
                            </div>   
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_category_btn">Submit</button>
                            </div>                     
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>