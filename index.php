<?php


//load our dbconn,and templates
require_once (dirname(__FILE__).'/config/dbinit.php');
require_once (dirname(__FILE__).'/config/mustacheinit.php');


//our global variables
$home_page_sql;
$category_selected;
$category_get_available=false;
$results_per_page = 4;
function gen_home_page_sql_query(){
    global $home_page_sql,$results_per_page,$category_get_available,$category_selected;

    //generate pagination links as array structure so we can render in html template
    $page =  isset($_GET['page']) ? $_GET['page'] : 1;
    //this will decide how many results we have to skip in our db query
    $skip = $results_per_page * ($page - 1);

    $category_selected = isset($_GET['category'])?$_GET['category'] : null;

    if ($category_selected != null){
        $home_page_sql = "SELECT * FROM items WHERE category='$category_selected' ORDER BY _id ASC "."LIMIT $skip,$results_per_page";
        $category_get_available = true;
    }else{
        $home_page_sql = "SELECT * FROM items ORDER BY _id ASC "."LIMIT $skip,$results_per_page";
        $category_get_available= false;
    }
}

gen_home_page_sql_query();

//our db queries
$result_items=$dbconn->query($home_page_sql);
$result_categories=$categories = $dbconn->query("SELECT category,COUNT(*) as count FROM items GROUP BY category");

//this array  will store all our returned items from db [used in templating]
$items = array("items"=>[],"categories"=>[],"pagination"=>[]);

//handle items results
if ($result_items){
   while($item =  $result_items->fetch_assoc()){
       array_push($items["items"],$item);
   }
}else{
    echo $dbconn->error;
}
//handle categories results
if($result_categories){

    while($row_category = $result_categories->fetch_assoc()){
       array_push($items["categories"],$row_category);
    }
}else{
    echo $dbconn->error;
}

//counts the ttotal items from our categories result
function get_TotalItems (){
    global $items,$category_get_available,$category_selected;

    $total=0;
    if(!$category_get_available) {
            //all items
        foreach ($items["categories"] as $key => $value) {
            $total += $value["count"];
        }
    }else{
        //only the count of a given category
        foreach ($items["categories"] as $key => $value) {
            if ($value["category"] == $category_selected){
                $total = $value["count"];
            }
        }//forEach

    }//if/else
    return $total;
}
$totalItems = get_TotalItems();

$items["totalItems"] =$totalItems;

function gen_pagination(){
    global $totalItems,$items,$results_per_page,$category_get_available,$category_selected;

    $num_pages = ceil($totalItems/$results_per_page);

    if (!$category_get_available) {
    //urls for normal pagination
        for ($i = 1; $i <= $num_pages; $i++) {
            array_push($items["pagination"], ["page" => $i, "page_href_link" => "index.php?page=$i"]);
        }

    }else{
    //urls when category is available
        for ($i = 1; $i <= $num_pages; $i++) {
            array_push($items["pagination"], ["page" => $i, "page_href_link" => "index.php?page=$i&category=$category_selected"]);
        }

    }//if/else

}//gen_pagination


gen_pagination();


//now re render our template with the data we extracted from sql
echo $mustache->render('home',$items);









// echo $mustache->render('home',array('isChild' => array(["username"=>"lokis","age"=>18],["username"=>"maixs","age"=>28],["username"=>"awesomekis","age"=>48]) ));


 ?>
