<?php

/** * User: Lokesh * Date: 4/8/2016 * Time: 4:14 PM */


//get the root directory
$currentPAth= dirname(__FILE__);

$currentPAthArray = explode("\\",$currentPAth);

array_pop($currentPAthArray);

$rootDir = implode('\\',$currentPAthArray);


// include db connection
require_once($rootDir.'/config/dbinit.php');


//this part reads the items json file and inserts into items[sql] table
$sql = "INSERT INTO items (_id,title,slogan,description,category,img_url,price) ";

//read the json file as a string
$itemsJson = file_get_contents($rootDir.'/config/items.json');


$items = json_decode($itemsJson,true);

var_dump( $items);


function item_handler($data){
	
	
	global $sql,$dbconn;
	
	
	$id = $data["_id"];
	
	$title = $data["title"];
	
	$slogan = $data["slogan"];
	
	$description = $data["description"];
	
	$category = $data["category"];
	
	$imgurl = $data["img_url"];
	
	$price = $data["price"];
	
	
	//t	his generates our new sql query
	$eachitemsql = $sql . "VALUES ($id,'$title','$slogan','$description','$category','$imgurl','$price')";
	
	
	$iteminsertresult =  $dbconn->query($eachitemsql);
	
	if ($iteminsertresult==true){
		
		echo "success insert";
		
	}
	else{
		
		echo $dbconn-> error;
		
	}
	
}
;

//for each item in array-> calls our custom function "item_handler"
array_walk($items,'item_handler');


//End of inserting items into items[sql] table from the json file

?>