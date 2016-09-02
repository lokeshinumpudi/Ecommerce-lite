<?php
/**
 * Created by PhpStorm.
 * User: LowKeys
 * Date: 4/9/2016
 * Time: 11:16 AM
 */

require_once (dirname(__FILE__).'/config/dbinit.php');

//$dbconn:connection

    $msg = array("type"=>"","msg"=>"");
 if(isset($_GET["type"])){

     if($_GET["type"] == "signup"){
                if(!empty($_GET["username"])){

                    $username =  trim($_GET["username"]);
                    $password =  trim($_GET["password"]);

                    $isuserexistquery = "SELECT username FROM accounts where username='$username'";

                    $checkresult = $dbconn->query($isuserexistquery);

                    if($checkresult->num_rows == 0){
                        //no previous present good to go
                        // username already doesnt exist put it into db
                        $checkresult->close();

                        $signupquery = "INSERT INTO accounts(_id,username,password,is_admin) VALUES(0,'$username',SHA('$password'),0)";
                        $result = $dbconn->query($signupquery);

//                      show user that signup success


                        $msg["type"]= "signup_success";
                        $msg["msg"] = "";
                        echo(json_encode($msg));



                    }else if($checkresult->num_rows == 1){
                        //user already exists prompt him to login

                        $msg["type"] = "account_exists";
                        $msg["msg"] = "";
                        echo(json_encode($msg));
                        
                    }else{

                    } //check 0,1,else rows in signup





                }//set signup form
     }//signup logic
     else{
    //login

         if(!empty($_GET["username"]) && !empty($_GET["password"]) ){

                    $username = trim($_GET["username"]);
                   $password = trim($_GET["password"]);

             $loginquery =  "SELECT _id,username FROM accounts where username = '$username' AND password = SHA('$password') ";

                 $loginresult  =  $dbconn->query($loginquery);

             if ($loginresult->num_rows == 1){
                 //login success


                 echo(json_encode($loginresult->fetch_assoc()));

                 
             }else{
                 echo "login failed";
             }
         }//username not empty
         else{
             echo "Enter both the details";
         }



     }//login logic



 }//type available