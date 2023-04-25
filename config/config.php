<?php

try {
    //host 
    $host = "localhost";

    //dbname
    $dbname = "u1762161_money";

    //username
    $username = "u1762161_money";

    //password
    $pass = "Ab1221418";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$user_id = $_COOKIE['user_id'];
