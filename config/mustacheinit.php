<?php
/**
 * User: Lokis
 * Date: 4/9/2016
 * Time: 8:52 AM
 */

// load composer autoload [so itll handle the rest of all packages autoloading]
require_once ("vendor/autoload.php");

//init our template engine and store in $mustache variable


//get the root directory

$currentPAth= dirname(__FILE__);
$currentPAthArray = explode("\\",$currentPAth);
array_pop($currentPAthArray);
$rootDir = implode('\\',$currentPAthArray);

$mustache= new Mustache_Engine(
    array(
        'loader' => new Mustache_Loader_FilesystemLoader($rootDir.'/views',
            array('extension' => '.html')
        ),
    ));