<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/session.php';


/**
 * This are functions that deals with validation and security
 */

// check if registration input is empty or not
function is_input_empty(...$inputs) {
    foreach ($inputs as $input) {
        if (empty($input)) {
            return true;
        }
    }
    return false;
}

// check if email is valid
function is_email_invalid($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

// check if email already exists
function is_email_already_exist($conn, $customer_email) {
    $query = "SELECT customer_email FROM customers WHERE customer_email = :email;";
    $stmt = $conn->prepare(($query));
    $stmt->bindParam(":email", $customer_email);
    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

// func to confirm credentials when user logins
function is_email_wrong($data) {
    if(!$data) {
        return true;
    } else {
        return false;
    }
}

// verify password when user logs in
function is_password_wrong($password, $hashedPassword) {
    if(!password_verify($password, $hashedPassword)) {
        return true;
    } else {
        return false;
    }
}

// show authentication error/success to user
function is_auth_error_or_success() {
    $errors = [];
    /**
     * retirevie errors from session depending on user operation
     */
    if (isset($_SESSION["errors_signin"])) {
        $errors = $_SESSION["errors_signin"];
        // delete the error data from session
        unset($_SESSION['errors_signin']);
        
    } else if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];
        // delete the error data from session
        unset($_SESSION['errors_signup']);
    }

    // if errors, display the error
    if (count($errors) > 0) {
        foreach ($errors as $err) {
            echo "<p style='color: red; font-size: 14px; padding-block:0.25rem;'>$err <br></p>";
            // TODO: remove the inline styles
        }
    // else..show success message
    } else if (isset($_GET["login"])) {
        echo "<div class='authentication-successful'>SignIn Successfull</div>";
    } else if (isset($_GET["register"])) {
        echo "<div class='authentication-successful'>Registration Successfull</div>";
    }
}

// profile update error/ success display
function is_update_error_or_success() {
    $errors = [];
    if (isset($_SESSION["errors_update_profile"])) {
        $errors = $_SESSION["errors_update_profile"];
        // delete the error data from session
        unset($_SESSION['errors_update_profile']);
    }

    // if errors, display the error
    if (count($errors) > 0) {
        foreach ($errors as $err) {
            echo "<p style='color: red; font-size: 14px; padding-block:0.25rem;'>$err <br></p>";
            // TODO: remove the inline styles
        }
    // else..show success message
    } else if (isset($_GET["update-success"])) {
        echo "<div class='authentication-successful'>Update Successful</div>";
    }
}

// prevent unauthorized users from booking events
function is_user_signed_in() {
    if(isset($_GET['event_booking_unauthorized'])) {
        echo "<div class='authentication-successful'>You need to SignIn to book Events</div>";
    }
}

// form validate for booking an event
function is_booking_successfull() {
    // if error present in booking
    if (isset($_SESSION["error_booking_failed"])) {
        // retrieve the error from session and display it
        $errors = $_SESSION["error_booking_failed"];
        foreach ($errors as $err) {
            echo "<p style='color: red; font-size: 14px; padding-block:0.25rem;'>$err <br></p>";
        }
        // delete the error data from session
        unset($_SESSION['error_booking_failed']);
    } else if (isset($_GET["booking-successful"])) { // if booking is successful, display popup
        echo '<div class="overlay-filter"></div>
              <div class="booking-successful">
                  <p>Hurray🥳,</p>
                  <h2>Booking Successful</h2>
                  <p class="margin-bottom">You\'ve taken a bold step closer to finding a better tomorrow.</p>
                  <div class="flex-items margin-bottom-md">
                      <img src="../../../assets/media/back.png" alt="">
                      <a href="./events.php">
                          Back to Events
                      </a>
                  </div>
                  <small>You can find the details of your bookings here:</small>
                  <a href="./mybookings.php">
                      <small>My Bookings</small>
                  </a>
              </div>';
    }
}




