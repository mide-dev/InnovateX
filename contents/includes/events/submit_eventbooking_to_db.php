<?php
require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../config/session.php";
require_once __DIR__ .'/../users/utils/user_auth.php';
require_once 'utils/insert_booking_in_db.php';
/**
 * Verify that a user initiated this php script via the form
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // extract form inputs
        $registered_name = trim($_POST['user-name']);
        $phone_number = trim($_POST['phone-number']);
        $booking_notes = trim($_POST['booking-notes']);
        $no_of_tickets = trim($_POST['no-of-tickets']);
        $price_per_person = $_POST['price_per_person'];
        $vat_amount = $_POST['vat_amount'];
        $total_booking_fee = $_POST['total_booking_fee'];

        $errors = [];
        // catch any empty field
        if (is_input_empty($registered_name, $phone_number, $no_of_tickets)) {
            $errors["empty_input"] = "Please fill in all fields!";
        }
        
        $event_id = $_SESSION['current_event'];
        // if error present
        if (count($errors) > 0) {
            $_SESSION["error_booking_failed"] = $errors;
            header("Location: ../../bookevent.php?event_id=".$event_id);
            die();
        } else { // if no errors in form, process booking
            $booking_data = [
                "user_id" => $_SESSION['user_id'],
                "event_id" => $_SESSION['current_event'],
                "registered_name" => $registered_name,
                "phone_number" => $phone_number,
                "booking_notes" => $booking_notes,
                "no_of_tickets" => $no_of_tickets,
                "vat_amount" => $vat_amount,
                "total_booking_cost" => $total_booking_fee,
            ];
            // insert booking details to db
            insert_booking_in_db($conn, $booking_data);
            header("Location: ../../bookevent.php?event_id=".$event_id."&booking-successful");
            die();
        }
    } catch (PDOException $e) {
        die("Error booking event: " . $e->getMessage());
    } 
}