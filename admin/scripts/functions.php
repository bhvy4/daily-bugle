<?php

function image_checker($image,$errors) {
    $allowed_extensions = array('jpg', 'jpeg', 'png');
    $image_name = $_FILES["images"]["name"];
    $temp_image_name = explode(".", $image_name);
    $ext = end($temp_image_name);

    //echo $image_name . " " . $ext;

    if (!in_array($ext, $allowed_extensions)) {
        $errors['image'] = "Only jpg,jpeg,png images are allowed";
        // print_r($errors);
    } else {
        if ($_FILES["images"]["size"] > 1048576) {
            $errors['image'] = "file size too large";
            // echo "too large";
        } else {
            $image = uniqid("img_") . "." . $ext;
        }
    }
    return $image;
}

function add_subcategory($category,$conn){
    $id = $category['id'];
    $query =  "select * from subcategory where category_id = '$id' ";
    $result = mysqli_query($conn,$query);
    $subcategories = array();
    if(mysqli_num_rows($result)>0){
        $subcategories = mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    foreach($subcategories as $sub){
        echo "<td>".$id."</td>";
        echo "<td><b>".$category['name']."</b>-".$sub['name']."</td>";
        echo "<td><img width='40' src='uploads/subcategory/".$sub['image']."' class='rounded-circle' alt='#'></td>";
        echo "<td>".$sub['created_on']."</td>";
        echo "<td>".$sub['updated_on']."</td>";
        echo "<td>".$sub['status']."</td>";
    }
}