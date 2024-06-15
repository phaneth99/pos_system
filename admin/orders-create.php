<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Create Order

                <a href="orders.php" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>

        <div class="card-body">

            <?php alertMessage(); ?>

            <form action="orders-code.php" method="POST">

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="name" class="form-label">Select Product *</label>
                        <select name="product_id" class="form-select mySelect2">
                            <option value="">--Select Product--</option>

                            <?php
                            $products = getAll('products');

                            if ($products) {
                                if (mysqli_num_rows($products) > 0) {
                                    foreach ($products as $proItem) {
                            ?>
                                        <option value="<?= $proItem['id']; ?>"><?= $proItem['name']; ?></option>
                            <?php
                                    }
                                } else {
                                    echo '<option value="">No product found!</option>';
                                }
                            } else {
                                echo '<option value="">Something Went Wrong!</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="qty" class="form-label">Quantity *</label>
                        <input type="number" id="qty" name="qty" value="1" class="form-control">
                    </div>

                    <div class="col-md-3 md-3 text-end">
                        <br>
                        <button type="submit" name="addItem" class="btn btn-primary">Add Item</button>
                    </div>
                </div>
            </form>

        </div>
    </div>


    <!-- Create_order_list -->

    <div class="card mt-3">
        <div class="card-header">
            <h4 class="mb-0">Product</h4>
            <div class="card-body">
                <?php
                if (isset($_SESSION['productItems'])) {

                    $sessionProducts = $_SESSION['productItems'];
                ?>
                    <div class="table-responsive m-3">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($sessionProducts as $key => $proItem) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $proItem['name']; ?></td>
                                        <td><?= $proItem['price']; ?></td>

                                        <td>
                                            <div class="input-group qtyBox">
                                                <input type="hidden" value="<?=$proItem['product_id']; ?>" class="proId">
                                                <!-- Defined the class name to work with jquery -->
                                                <button class="input-group-text decrement">-</button>
                                                <input type="text" value="<?= $proItem['quantity']; ?>" class="qty quantityInput">
                                                <button class="input-group-text increment">+</button>
                                            </div>
                                        </td>

                                        <td><?= number_format($proItem['price'] * $proItem['quantity'], 0) ?></td>

                                        <td>
                                            <a href="order-item-delete.php?index=<?= $key; ?>" class="btn btn-danger">Remove</a>
                                        </td>

                                    </tr>
                            </tbody>
                        <?php endforeach; ?>
                        </table>
                    </div>
                <?php
                } else {
                    echo '<h5>No Items added</h5>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>