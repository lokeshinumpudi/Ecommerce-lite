<?php
/**
 * Created by PhpStorm.
 * User: LowKeys
 * Date: 4/27/2016
 * Time: 1:27 AM
 */

require_once (dirname(__FILE__).'/config/dbinit.php');
require_once (dirname(__FILE__).'/config/mustacheinit.php');




//getting cartitems


if (isset($_GET["userid"])) {
    if (!empty($_GET["userid"])) {
            $id = $_GET["userid"];
        $query = "SELECT * FROM cart INNER JOIN  items ON items._id = cart.productId WHERE  userid = '$id'";
        $results = $dbconn->query($query);
        $items = ["items"=>[]];
        if ($results) {
            while ($item = $results->fetch_assoc()) {
                array_push($items["items"], $item);
            }
            echo $mustache->render('cart',$items);
        } else {
            echo $dbconn->error;
        }
    }//empty


}//set
else{

}


//setting cart items

if (!empty($_POST["username"]) && !empty($_POST["productId"]) &&!empty($_POST["userId"])) {

    $username = $_POST["username"];
    $productid = $_POST["productId"];
    $userid = $_POST["userId"];

    $insertcartquery = "INSERT INTO cart(_id,productid,userid) VALUES (0,'$productid','$userid')";


    $result = $dbconn->query($insertcartquery);


    if ($result) {

        echo "insert success";
    } else {
        echo "insert failure";
        echo $dbconn->error;
    }

}else{
//    echo "fields missing";
};






