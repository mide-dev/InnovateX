<?php

function update_user_without_pwd($conn, ...$data) {
    // destructure data
    [$user_id, $firstName, $lastName, $email, $bio, $profileAvatar] = $data;

    $query = "UPDATE customers SET customer_forename = :firstName, customer_surname = :lastName, 
    customer_email = :email, customer_bio = :bio, display_avatar = :profileAvatar WHERE customerID = :user_id";

    // Prepare the statement
    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':bio', $bio);
    $stmt->bindParam(':profileAvatar', $profileAvatar);
    $stmt->bindParam(':user_id', $user_id);

    // Execute the statement
    $stmt->execute();
}


function update_user_with_pwd($conn, ...$data) {
    // destructure data
    [$user_id, $firstName, $lastName, $email, $bio, $profileAvatar, $newPassword] = $data;

    // hash the password before inserting in the database
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $query = "UPDATE customers SET customer_forename = :firstName, customer_surname = :lastName, 
    customer_email = :email, customer_bio = :bio, display_avatar = :profileAvatar, password_hash = :hashedPassword WHERE customerID = :user_id";

    // Prepare the statement
    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':bio', $bio);
    $stmt->bindParam(':profileAvatar', $profileAvatar);
    // Bind hashedPassword directly to the statement, not password_hash
    $stmt->bindParam(':hashedPassword', $hashedPassword);
    $stmt->bindParam(':user_id', $user_id);

    // Execute the statement
    $stmt->execute();
}

