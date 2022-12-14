<?php 
  include('includes/header.php');
  include('../middleware/admin_middleware.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card all-category-table">
                <div class="card-header">
                    <h3>Categories</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $category = fetch_all_from_db('categories');
                            if(mysqli_num_rows($category) > 0) { 
                                foreach($category as $item) {?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?>">
                                        </td>
                                        <td><?= $item['status'] == '0' ? 'Visible' : 'Hidden'; ?></td>
                                        <td>
                                            <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                        <?php } } else{ echo "No category found"; }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>