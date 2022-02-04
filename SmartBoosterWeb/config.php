<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');
 
/* Attempt to connect to MySQL database */
$link = odbc_connect('RMK','','');
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . odbc_connect());
}
?>
