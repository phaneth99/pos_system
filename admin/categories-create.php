<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Add Category

                <a href="category.php" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>

        <div class="card-body">
            <?php alertMessage(); ?>
            <form action="code.php" method="POST">

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" require class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="dec">Description *</label>
                        <textarea name="dec" id="dec" require class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="status">Status (UnChacked = Visible, Checked = Hidden)</label>
                         <br>
                        <input type="checkbox" name="status" style="width: 30px; height: 30px;">
                    </div>
                    
                    <div class="col-md-6 md-3 text-end">
                        <br>
                        <button type="submit" name="saveCategory" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
           
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>