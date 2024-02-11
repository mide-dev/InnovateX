<?php

function get_event_detail($conn, $event_id) {

    $query = "SELECT * FROM events WHERE eventID = :event_id;";
        
    // prepare and bind parameters
    // This is to provide more security and prevent attacks like SQL INJECTION
    $stmt = $conn->prepare(($query));
    $stmt->bindParam(":event_id", $event_id);
    $stmt->execute();
    
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}