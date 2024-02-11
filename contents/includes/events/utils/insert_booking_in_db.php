<?php

function insert_booking_in_db($conn, $data) {

    // create new user template in the database
    $query = "INSERT INTO booking (eventID, customerID, registered_name, phone_number, number_people, vat_amount, total_booking_cost, booking_notes) VALUES
    (:event_id, :user_id, :registered_name, :phone_number, :no_of_tickets, :vat_amount, :total_booking_cost, :booking_notes)";

    // prepare and bind parameters
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":event_id", $data['event_id']);
    $stmt->bindParam(":user_id", $data['user_id']);
    $stmt->bindParam(":registered_name", $data['registered_name']);
    $stmt->bindParam(":phone_number", $data['phone_number']);
    $stmt->bindParam(":no_of_tickets", $data['no_of_tickets']);
    $stmt->bindParam(":vat_amount", $data['vat_amount']);
    $stmt->bindParam(":total_booking_cost", $data['total_booking_cost']);
    $stmt->bindParam(":booking_notes", $data['booking_notes']);
    $stmt->execute();
}
