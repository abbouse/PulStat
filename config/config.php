<?php

try {
    //host 
    $host = "localhost";

    //dbname
    $dbname = "dbname";

    //username
    $username = "dbname";

    //password
    $pass = "pswrd";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$user_id = $_COOKIE['user_id'];
