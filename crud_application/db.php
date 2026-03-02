<?php
define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","crud_application");

$connect = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

if (!$connect) {
    die("CONNECTION FAILED....");
} 
?>