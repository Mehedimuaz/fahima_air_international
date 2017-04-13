<?php
/**
 * Created by PhpStorm.
 * User: avash
 * Date: 1/21/17
 * Time: 2:54 AM
 */

$servername = "localhost";
$username='';
$password='';
$dbname='';

if($_SERVER['SERVER_ADDR']!='127.0.0.1' && substr($_SERVER['SERVER_ADDR'],0,7)!='192.168') {
    $username = "fahimaairinterna_admin";
    $password = "VeTo2DWl(Zec";
    $dbname = "fahimaairinterna_hajjreg";
}
else {
    $dbname = "robolutionRegDB17";
    $username = "script";
    $password = "asdasd";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$connection = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Database error: " . $conn->error);
	
}
?>
