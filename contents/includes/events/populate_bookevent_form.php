<?php
require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../config/session.php";
require_once 'utils/get_event_details.php';
require_once __DIR__ .'/../users/utils/select_user.php';



/**
 * populate the event booking 
 * form dynamically
 */
$event_fee = '';
if($_SESSION['current_event'] && $_SESSION['user_id']) {

    $event_id = $_SESSION['current_event'];

    $data = get_event_detail($conn, $event_id);

    // calculate VAT and TOTAL PRICE
    $event_fee = $data["price_per_person"];

    /**
     * get the current user info
     * to populate the booking form dynamically.
     */
    $current_user_id = '';
    if(isset($_SESSION['user_id'])) {
        $current_user_id = $_SESSION['user_id'];
    }
    $current_user_info = select_user_with_id($conn, $current_user_id);
    // get current user fullname and input into booking field
    $current_user_name = $current_user_info['customer_forename'].' '.$current_user_info['customer_surname'];
} else {
    header("Location: ../pages/events.php");
    die();
}
