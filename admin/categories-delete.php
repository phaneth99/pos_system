<?php
require '../config/function.php';
$paraResultId = checkParamId('id');
if (is_numeric($paraResultId)) {

    $categoryId = validate($paraResultId);

    $category = getByid('categories', $categoryId);

    if ($category['status'] == 200) {
        $adminDeleteRes = delete('categories', $categoryId);

        if ($adminDeleteRes) {

            redirect('categories.php', 'Category Deleted Successfully');
        } else {
            redirect('categories.php',  'Something Went Wrong.');
        }
    } else {
        redirect('categories.php', $categoryId['message']);
    } 
} else {
    redirect('categories.php', 'Something Went Wrong.');
}
