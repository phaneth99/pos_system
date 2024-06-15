<?php
include('../config/function.php');

if(!isset($_SESSION['productItems'])){
    $_SESSION['productItems'] = [];
}

if(!isset($_SESSION['productItemIds'])){
    $_SESSION['productItemIds'] = [];
}


if(isset($_POST['addItem'])){
    
    $pro_id = validate($_POST['product_id']);
    $qty = validate($_POST['qty']);

    $checkProduct = mysqli_query($conn, "SELECT * FROM products WHERE id = '$pro_id' LIMIT 1");

    if($checkProduct){

        if(mysqli_num_rows($checkProduct) > 0 ){

            $row = mysqli_fetch_assoc($checkProduct);

            if($row['quantity'] < $qty){
                redirect('orders-create.php','Only'.' '.$row['quantity'].' '.'Quantity available!');
            }

            $proData = [
                'product_id' => $row['id'],
                'name' => $row['name'],
                'image' => $row['image'],
                'price' => $row['price'],
                'quantity' => $qty
            ];
            // The right Value is the name to store in the  SESSION

            if(!in_array($row['id'], $_SESSION['productItemIds'])){

                array_push($_SESSION['productItemIds'],$row['id']);
                array_push($_SESSION['productItems'],$proData);

            }else{

            foreach($_SESSION['productItems'] as $key => $proSessionItem){

                if($proSessionItem['product_id'] == $row['id']){

                    $newQuantity = $proSessionItem['quantity'] + $qty;

                    $proData = [
                        'product_id' => $row['id'],
                        'name' => $row['name'],
                        'image' => $row['image'],
                        'price' => $row['price'],
                        'quantity' => $newQuantity
                    ];
                    $_SESSION['productItems'][$key] = $proData;

                }

            }

            }
            redirect('orders-create.php','Item added'.' '.$row['name']);

        }else{
            redirect('orders-create.php','No such product found!');
        }

    }else{
        redirect('orders-create.php','Something Went Wrong!');
    }

}
if(isset($_POST['productIncDec'])){
    $productId = validate($_POST['product_id']);
    $quantity = validate($_POST['quantity']);

    $flag = false;
    foreach($_SESSION['productItems'] as $key => $item){

        if($item['product_id']== $productId){

            $flag = true;
            $_SESSION['productItems'][$key]['quantity'] = $quantity;

        }

    }
    if($flag){
        
        jsonRespone(200,'Success','Quantity Update!');

    }else{

        jsonRespone(500,'error','Something Went Wrong. Please re-fresh');

    }
}
?>