<?php 
session_start();

if(isset($_SESSION['auth'])){
    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
    exit();
}
include('includes/header.php'); ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <?php if(isset($_SESSION['message'])) {?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?php echo $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['message']); }?>
                <div class="card-header">
                    <h2>Register</h2>
                </div>
                <div class="card-body">
                    <form action="functions/authcode.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter your phone number">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input required type="email" class="form-control" name="email" id="email" placeholder="Enter your email addres">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input required type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="cpassword" id="confirm-password" placeholder="Confirm password">
                        </div>
                        <!--<div class="mb-3">
                            <label class="form-label">Remember me</label>
                            <input type="checkbox" class="form-check-input" id="checkbox">
                        </div>-->
                        <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>