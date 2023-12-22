<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'testdb';

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection erro" . $conn->connect_error);
}