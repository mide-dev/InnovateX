<?php
require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../config/session.php";


// if user clicks book event
if (isset($_POST['book-event'])) {
    // if user is logged in, grab their information from db and allow user book event
    if(isset($_SESSION["user_id"])) {
        $current_event = $_SESSION['current_event'];
        header("Location: ../../bookevent.php?event_id=".$current_event);
    } else { //if user is not logged in, prompt them to login first
        header("Location: ../../signin.php?event_booking_unauthorized");
    }
}

