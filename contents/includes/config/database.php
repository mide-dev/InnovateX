<?php

$servername = "localhost";
$db_name = "innovatex";
$username = "root";
$db_password = "";

// try to connect to database
try {
    // instantiate new data object and set requirements
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $db_password);
    // if theres an error, throw exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // display error to browser
    echo "connection error: " . $e -> getMessage();
}

