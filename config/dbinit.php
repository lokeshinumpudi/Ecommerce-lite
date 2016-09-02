<?php
/**
 * User: Lokis
 * Date: 4/9/2016
 * Time: 8:46 AM
 */

//change this variables to change the db connection

$host = "localhost";
$username = "lokis";
$password = "lokismax";
$dbname = "lokiscart";


//this will create a mysqli object wrapper for the sql db
$dbconn = new mysqli($host,$username,$password,$dbname);

