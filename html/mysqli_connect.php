<?php

// define constant variables
define('DB_NAME', 'register_db');
define('DB_USER', 'root');
define('DB_PASSWORD', 'mas123');
define('DB_HOST', '127.0.0.1');

try{

    // connection variable
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("not conn");

    // encoded language
    mysqli_set_charset($con, 'utf8');


}catch (Exception $ex){
    print "An Exception occurred. Message: " . $ex->getMessage();
} catch (Error $e){
    print "The system is busy please try later";
}
?>
