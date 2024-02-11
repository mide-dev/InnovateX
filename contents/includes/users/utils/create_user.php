<?php

    function create_user($conn, ...$data) {
        // destructure data
        [$firstName, $lastName, $password, $email, $birthDate, $birthMonth, $birthYear] = $data;
        // hash the pasword before inserting in db
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // // convert date of birth to the right format
        $dob = "{$birthYear}-{$birthMonth}-{$birthDate} 00:00:00";

        // create new user template in database
        $query = "INSERT INTO customers (password_hash, customer_forename, customer_surname, customer_email, date_of_birth) VALUES
        (:password_hash, :customer_forename, :customer_surname, :customer_email, :date_of_birth)";

        // prepare and bind parameters
        // This is to provide more security and prevent attacks like SQL INJECTION
        $stmt = $conn->prepare(($query));
        $stmt->bindParam(':password_hash', $hashedPassword);
        $stmt->bindParam(':customer_forename', $firstName);
        $stmt->bindParam(':customer_surname', $lastName);
        $stmt->bindParam(':customer_email', $email);
        $stmt->bindParam(':date_of_birth', $dob);
        $stmt -> execute();
    }
