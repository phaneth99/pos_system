<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Add Product

                <a href="products.php" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>

        <div class="card-body">
            <?php alertMessage(); ?>
            <form action="code.php" method="POST" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Select Category</label>
                        <select name="category_id" class="form-select">
                            <option value="">Select Category</option>
                            <?php
                            $categories = getAll('categories');

                            if ($categories) {
                                if (mysqli_num_rows($categories) > 0) {
                                    foreach ($categories as $cateItem) {
                                        echo '<option value="' . $cateItem['id'] . '">' . $cateItem['name'] . '</option>';
                                    }
                                } else {
                                    echo '<option value="">No Category found</option>;';
                                }
                            } else {
                                echo '<option value="">Something Went Wrong!</option>;';
                            }
                            ?>
                        </select>

                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="name">Product Name *</label>
                        <input type="text" id="name" name="name" require class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="dec">Description *</label>
                        <textarea name="dec" id="dec" require class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="price">Price *</label>
                        <input type="number" id="price" name="price" require class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="qty">Quantity *</label>
                        <input type="number" id="qty" name="qty" require class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="image">Image *</label>
                        <input type="file" id="image" name="image" require class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="status">Status (UnChacked = Visible, Checked = Hidden)</label>
                        <br>
                        <input type="checkbox" name="status" style="width: 30px; height: 30px;">
                    </div>

                    <div class="col-md-6 md-3 text-end">
                        <br>
                        <button type="submit" name="saveProduct" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>