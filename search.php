<?php
/**
 * Created by PhpStorm.
 * User: LowKeys
 * Date: 4/9/2016
 * Time: 11:17 AM
 */


require_once (dirname(__FILE__).'/config/dbinit.php');
require_once (dirname(__FILE__).'/config/mustacheinit.php');


$search_query = "SELECT * FROM items ";
$items = ["items"=>[],"pagination"=>[]];

//TODO: Increase the search range
if (isset($_GET['search_item'])){

    $user_search =strtolower($_GET['search_item']);
    if (empty($user_search)){
        $user_search = " ";
    }
    $clean_search = str_replace(',',' ',$user_search);
    $search_words = explode(" ",$clean_search);

    $final_search_words = [];
//    remove empty search words
    if (count($search_words)>0){
            foreach ($search_words as $word){
                if (!empty($word)){
                    $final_search_words[] = $word;
                }
            }
    }

    //now generate where clause for all our range of columns

    $where_list = [];
    if (count($final_search_words)>0){
        foreach ($final_search_words as $word){
            $where_list[] = " LOWER(title) LIKE '%$word%' ";
            $where_list[] = " LOWER(slogan) LIKE '%$word%' ";
            $where_list[] = " LOWER(category) LIKE '%$word%' ";
            $where_list[] = " LOWER(description) LIKE '%$word%' ";
        }
    }

    //now implore[concat an array with a delimiter into a string] with OR [so it becoms a valid sql][]

        $where_clause = implode("OR",$where_list);

    if (!empty($where_clause)){
        $search_query .= "WHERE $where_clause";

       $search_results =  $dbconn->query($search_query);

        if ($search_results){

            //clean results format and render the template
            while($row = $search_results->fetch_assoc()){
                        $items["items"][] = $row;
            }

            echo $mustache->render('search',$items);
        }else{
            echo $dbconn->error;
        }

    }//if!empty

    else{
        //render our page even if its empty query
        echo $mustache->render('search',$items);
    }




}else{
    echo $mustache->render('search',array());
}






