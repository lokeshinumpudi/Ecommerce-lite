<?php
/**
 * Created by PhpStorm.
 * User: LowKeys
 * Date: 4/9/2016
 * Time: 11:15 AM
 */


//load our dbconn,and templates
require_once (dirname(__FILE__).'/config/dbinit.php');
require_once (dirname(__FILE__).'/config/mustacheinit.php');


$uploads_dir = dirname(__FILE__) . '/views/img/products/';
$product_insert_sql = "INSERT INTO items ";

if (isset($_POST['product_submit'])){

    $title = trim($_POST['title']);
    $slogan = trim($_POST['slogan']);
    $description = trim($_POST['description']);
    $category = trim($_POST['category']);
    $price = trim($_POST['price']) ;
    $uploaded_file = $_FILES['product_img'];
    $temp_path = trim($uploaded_file['tmp_name']) ;
    $target_path = $uploads_dir . $uploaded_file['name'];
    //now  move the file from tmp to our uploads dir
//   TODO  : generate a random name for the file

    if (move_uploaded_file($temp_path,$target_path)){

        //now insert into db
        $img_url = '/img/products/'.$uploaded_file['name'];
        $product_insert_sql = $product_insert_sql. "VALUES (0,'$title','$slogan','$description','$category','$img_url','$price')";

        $insert_result = $dbconn->query($product_insert_sql);
//on success redirect to uploaded product page
        if ($insert_result){
            header("Location:index.php?category=$category");
        }else{
            echo $dbconn->error;
        }

    }


}else{
    echo $mustache->render('admin',array());

}


