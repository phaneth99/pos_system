<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Edit Product

                <a href="products.php" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>

        <div class="card-body">
            <?php alertMessage(); ?>

            <form action="code.php" method="POST" enctype="multipart/form-data">

                <?php
                $product_id =  checkParamId('id');

                if (!is_numeric($product_id)) {
                    echo '<h5>Id is not a number</h5>';
                    return false;
                }

                $product = getByid('products', $product_id);

                if ($product['status'] == 200) {

                ?>
                    <input type="hidden" name="product_id" value="<?=$product['data']['id']; ?>">
                
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
                                            
                                            ?>
                                            <option value="<?=$cateItem['id'];?>"
                                            <?= $product['data']['category_id'] == $cateItem['id'] ? 'selected':''; ?>
                                            >

                                            <?=$cateItem['name'];?>
                                        </option>
                                            <?php

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
                        <div class="col-12 mb-3">
                            <label for="name">Name *</label>
                            <input type="text" id="name" name="name" value="<?= $product['data']['name']; ?>" require class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="dec">Description *</label>
                            <textarea name="dec" id="dec" require class="form-control" rows="3"> <?= $product['data']['description']; ?></textarea>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="price">Price *</label>
                            <input type="number" id="price" name="price" value="<?= $product['data']['price']; ?>" require class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="qty">Quantity *</label>
                            <input type="number" id="qty" name="qty" value="<?= $product['data']['quantity']; ?>" require class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="image">Image *</label>
                            <input  type="file" id="image" name="image" require class="form-control">
                            <img   src="../<?=$product['data']['image'];?>" style="width: 50px; height:50px" class="mt-3" alt="Image">
                        </div>

                        <div class="col-md-6">
                            <label for="status">Status (UnChacked = Visible, Checked = Hidden)</label>
                            <br>
                            <input type="checkbox" name="status" value="1" <?= $product['data']['status'] == true ? 'checked' : ''; ?> style="width: 30px; height: 30px;">
                        </div>

                        <div class="col-md-6 md-3 text-end">
                            <br>
                            <button type="submit" name="updateProduct" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                <?php } else {
                    echo '<h5>' . $product['message'] . '</h5>';
                }
                ?>
            </form>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>