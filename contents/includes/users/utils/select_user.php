<?php
// GET A USER WITH EMAIL
function select_user_with_email($conn, $user_email) {
    $query = "SELECT * FROM customers WHERE customer_email = :customer_email;";
    
    // prepare and bind parameters
    // This is to provide more security and prevent attacks like SQL INJECTION
    $stmt = $conn->prepare(($query));
    $stmt->bindParam(":customer_email", $user_email);
    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

// GET A USER WITH ID
function select_user_with_id($conn, $id) {
    $query = "SELECT * FROM customers WHERE customerID = :id;";
    
    // prepare and bind parameters
    // This is to provide more security and prevent attacks like SQL INJECTION
    $stmt = $conn->prepare(($query));
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}