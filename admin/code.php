<?php
include('../config/function.php');
// Insert Admins
if (isset($_POST['saveAdmin'])) {
    // Validation Data From Form

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;



    if ($name != '' && $email != '' && $password != '') {
        // To check data validation --> If not empty return true ---> False

        if (!is_numeric($phone) || strlen($phone) != 9 && strlen($phone) != 10) {
            redirect('admins-create.php', 'Invalid phone number.');
            exit;
        }


        $emailCheck = mysqli_query($conn, "SELECT * FROM admins WHERE email ='$email'");
        if ($emailCheck) {

            if (mysqli_num_rows($emailCheck) > 0) {
                redirect('admins-create.php', "Email Already used by another user");
            } else {
                $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);

                $data = [
                    'name' => $name,
                    'email' => $email,
                    'password' => $bcrypt_password,
                    'phone' => $phone,
                    'is_ban' => $is_ban
                ];
                $result = insert('admins', $data);
            }

            if ($result) {
                redirect('admins.php', 'Admin Created Successfully!');
            } else {
                redirect('admins-create.php', 'Something went wrong! Please try again.');
            }
        }
    } else {
        redirect('admins-create.php', 'Please fill requiered fields.');
    }
}

//  Update Admins

if (isset($_POST['updateAdmin'])) {

    // Validate data & select data by id using function

    $adminId = validate($_POST['adminId']);
    $adminData = getByid('admins', $adminId);
    if ($adminData['status'] != 200) {  // check if no data row return to endit back
        redirect('admins-edit.php', 'Please fill requiered fields.');
    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;

    if ($password != '') {
        $hashedpassword = password_hash($password, PASSWORD_BCRYPT);
    } else {
        $hashedpassword = $adminData['data']['password'];
    }

    if ($name != '' && $email != '' && $phone != '') {

        if (!is_numeric($phone) || strlen($phone) != 9 && strlen($phone) != 10) {
            redirect('admins-edit.php?id=' . $adminId, 'Invalid phone number.');
            exit;
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $hashedpassword,
            'phone' => $phone,
            'is_ban' => $is_ban
        ];
        $result = update('admins', $adminId, $data);

        if ($result) {
            redirect('admins-edit.php?id=' . $adminId, 'Admin Updated Successfully!');
        } else {
            redirect('admins-edit.php', 'Something went wrong! Please try again.');
        }
    } else {

        redirect('admins-edit.php?id=' . $adminId, 'Please fill requiered fields.');
    }
}

// Category Insert

if (isset($_POST['saveCategory'])) {

    $name = validate($_POST['name']);
    $dec = validate($_POST['dec']);
    $status = isset($_POST['status']) == true ? 1 : 0;


    $data = [
        'name' => $name,
        'description' => $dec,
        'status' => $status
    ];
    $result = insert('categories', $data);

    if ($result) {
        redirect('Categories.php', 'Category Created Successfully!');
    } else {
        redirect('categories-create.php', 'Something went wrong! Please try again.');
    }
}

// Update Category
if (isset($_POST['updateCategory'])) {

    $paramValue = validate($_POST['categoryId']);

    $category = getByid('categories', $paramValue);

    if ($category['status'] != 200) {
        redirect('categories-edit.php', 'Please fill requiered fields.');
    }

    $name = validate($_POST['name']);
    $dec = validate($_POST['dec']);
    $status = validate($_POST['status']) == true ? 1 : 0;

    if ($name != '') {

        $data = [
            'name' => $name,
            'description' => $dec,
            'status' => $status
        ];
        $result = update('categories', $paramValue, $data);

        if ($result) {
            redirect('categories-edit.php?id=' . $paramValue, 'Category Updated Successfully!');
        } else {
            redirect('categories-edit.php', 'Something went wrong! Please try again.');
        }
    } else {

        redirect('categories-edit.php?id=' . $paramValue, 'Please fill requiered fields.');
    }
}

// Saving products
if (isset($_POST['saveProduct'])) {

    $categoryId = validate($_POST['category_id']);
    $name = validate($_POST['name']);
    $dec = validate($_POST['dec']);
    $price = validate($_POST['price']);
    $quantity = validate($_POST['qty']);
    $image = validate($_POST['image']);
    $status = isset($_POST['status']) == true ? 1 : 0;

    if ($_FILES['image']['size'] > 0) {

        //if image export will move to the path of image_forlder 

        $path = "../assets/uploads/products";
        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        $fileName = time() . '.' . $image_ext;

        move_uploaded_file($_FILES['image']['tmp_name'], $path . "/" . $fileName);

        $finalImage = "assets/uploads/products/" . $fileName;
    } else {
        $finalImage = "";
    }


    $data = [
        'name' => $name,
        'category_id' => $categoryId,
        'description' => $dec,
        'price' => $price,
        'quantity' => $quantity,
        'image' => $finalImage,
        'status' => $status
    ];
    $result = insert('products', $data);

    if ($result) {
        redirect('products.php', 'Product Created Successfully!');
    } else {
        redirect('products-create.php', 'Something went wrong! Please try again.');
    }
}

//Update Product

if (isset($_POST['updateProduct'])) {

    $product_id = validate($_POST['product_id']);

    $productData = getByid('products', $product_id);

    if (!$productData) {
        redirect('products.php', 'No such product found');
        exit;
    }

    $category_id = validate($_POST['category_id']);
    $name = validate($_POST['name']);
    $dec = validate($_POST['dec']);
    $price = validate($_POST['price']);
    $quantity = validate($_POST['qty']);
    $image = validate($_POST['image']);
    $status = isset($_POST['status']) == true ? 1 : 0;

    if ($_FILES['image']['size'] > 0) {


        $path = "../assets/uploads/products";

        $image_ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);

        $fileName = time() . '.' . $image_ext;

        move_uploaded_file($_FILES['image']['tmp_name'], $path . "/" . $fileName);

        $finalImage = "assets/uploads/products/" . $fileName;

        $deleteImage = "../".$productData['data']['image'];

        if(file_exists($deleteImage)){
            unlink($deleteImage);

        }

    } else {
        $finalImage = $productData['data']['image'];
    }

    $data = [
        'name' => $name,
        'category_id' => $category_id,
        'description' => $dec,
        'price' => $price,
        'quantity' => $quantity,
        'image' => $finalImage,
        'status' => $status
    ];
    $result = update('products',$product_id, $data);

    if ($result) {
        redirect('products-edit.php?id='.$product_id, ' Updated Successfully!');
    } else {
        redirect('products-edit.php?id='.$product_id, 'Something went wrong! Please try again.');
    }
}
