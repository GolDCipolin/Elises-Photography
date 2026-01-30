<?php
//Define database connection constants
define('DB_HOST', 'localhost');
define('DB_SELECTER','selecter');
define('DB_SEL_PASS', 'password');
define('DB_INSERTER', 'inserter');
define('DB_INS_PASS', 'password');
define('DB_UPDATER', 'updater');
define('DB_UPD_PASS', 'password');
define('DB_NAME', 'photography');
define('DB_DELETER', 'deleter');
define('DB_DEL_PASS', 'password');

//create timestamps
date_default_timezone_set('Europe/London');
$today = date("F j, Y, g:i a");

//cleaning function
function cleaner($input){
    $input=trim($input);
    $input=htmlentities($input, ENT_QUOTES);
    return $input;
}//end of function cleaner

$conn = mysqli_connect(DB_HOST, DB_INSERTER, DB_INS_PASS, DB_NAME) or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn, 'photography') or die(mysqli_error()); //selecting database

//constants
?>