<?php include('includes/header.php');?>



<div class="py-5" style="background-image:url('admin//assets//img//bg_pos.avif')">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 py-5 text-center">

                <?php alertMessage(); ?>

                <h1 class="mt-3 text-info fw-bolder">Welcome To Fashion POS System </h1>

                <?php if(!isset($_SESSION['loggedIn'])) :  ?>
                <a href="login.php" class="btn btn-primary mt-4">Login</a>

                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
<?php include('includes/footer.php') ?>