<?php
require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../config/session.php";
require_once 'utils/get_event_details.php';

// if event id is present in url. allow user acces
// event details, else. navigate them back to events.
if(isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];  
    // store current event in session 
    $_SESSION['current_event'] = $event_id;

    $data = get_event_detail($conn, $event_id);

    // convert sql date to the required format
    $raw_date = new DateTime($data["event_date"]);
    $formattedDate = $raw_date->format('l, F jS');
    $formattedTime = $raw_date->format('g:i A');

    
} else {
    header("Location: ../../events.php");
    die();
}

function is_event_booked_already($conn) {
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $event_id = $_SESSION['current_event'];

        $query = "SELECT * FROM `booking` WHERE customerID = :user_id AND eventID = :event_id";
        $stmt = $conn->prepare(($query));
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":event_id", $event_id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}
