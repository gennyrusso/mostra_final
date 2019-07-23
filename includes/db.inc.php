<?php

$servername= "localhost";
$db_username= "root";
$db_password="";
$db_name="mostre";

$conn= mysqli_connect($servername, $db_username, $db_password, $db_name);

// Change character set to utf8
mysqli_set_charset($conn,"utf8");

if(!$conn){

    die("connessione fallita: ".mysqli_connect_error());
}