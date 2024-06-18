<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <!-- shadow-small -->
        <div class="card-header">
            <h4 class="mb-0">Orders
            </h4>
        </div>

        <div class="card-body">

            <?php alertMessage() ?>

            <?php
                $order = mysqli_query($conn, "SELECT o.*, c.* FROM orders o, customers c WHERE c.id = o.customer_id ORDER by o.id DESC");

                if($order){
                    if(mysqli_num_rows($order) > 0){
                        ?>
                        
                        <table class="table table-striped table-bordered aligin-items-center justify-content-center">
                            <thead>
                                <tr>
                                    <th>Tracking No.</th>
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                    <th>Payment Method</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($order as $orderItem) :?>
                                    <tr>
                                        <td class="fw-bold"><?= $orderItem['tracking_no']; ?></td>
                                        <td><?= $orderItem['name']; ?></td>
                                        <td><?= $orderItem['phone']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($orderItem['order_date'])); ?></td>
                                        <td><?= $orderItem['order_status']; ?></td>
                                        <td><?= $orderItem['payment_method']; ?></td>
                                        <td>
                                            <a href="orders-view.php?tracking=<?= $orderItem['tracking_no'] ;?>" class="btn btn-info mb-0 px-2 btn-sm">View</a>
                                            <a href="orders-view-print.php?tracking=<?= $orderItem['tracking_no']; ?>" class="btn btn-primary mb-0 px-2 btn-sm">Print</a>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                            </tbody>

                        </table>

                        <?php

                    }else{
                       echo '<h5>No Record Available</h5>';
                    }

                }else{
                    echo'<h5>Somehing Went Wrong!</h5>';
                }
             ?>


        
        </div>


<?php include('includes/footer.php'); ?>