<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// rest of your code
// require the db helper class
require_once 'db/dbconnect.php';
require_once 'db/dbhelper.php';
require_once 'myapi.class.php';
require_once 'db/functions.php';

// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) 
{
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}


try 
{
    $API = new MyAPI($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);
    // echo "Dimgba";
    // echo $_SERVER['HTTP_HEADER'];
    echo $API->processAPI();
} 
catch (Exception $e) 
{
    echo json_encode(Array('error' => $e->getMessage()));
}