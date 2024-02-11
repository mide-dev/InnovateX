<?php
/**
 * THHIS IS THE LOGIC TO SIGN IN A USER
 */

/**
 * Verify that a user initiated this php script using the "sign in" form.
 * if not, send user back to homepage. this is to prevent a malicious user
 * from accessing the signin script directly.
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = trim($_POST["email"]);
    $user_password = trim($_POST["password"]);
    
    try {
        require_once "../config/database.php";
        require_once "../config/session.php";
        require_once "./utils/user_auth.php"; 
        require_once "./utils/select_user.php";
        // VALIDATION
        // array to store and display error(s) 
        $errors = [];
        
        // catch any empty field
        if (is_input_empty($user_email, $user_password)) {
            $errors["empty_input"] = "Please fill in all fields!";
        }

        // try to get the user from db
        $data = select_user_with_email($conn, $user_email);
        /**
         * if error 404_NOT_FOUND. save the error in errors array above.
         */
        if (is_email_wrong($data) || is_password_wrong($user_password, $data["password_hash"])) {
            $errors["login_incorrect"] = "Incorrect Login Credentials!";
        }
        /**
         * If form catches any error, 
         * save error messages to session, show it to user
         * and prevent login
         */
        if (count($errors) > 0) {
            $_SESSION["errors_signin"] = $errors;
            header("Location: ../../signin.php");
            die();

        } else { // if no errors, store user id in session and sign in the user
            $_SESSION["user_id"] = $data["customerID"];

            /**
             * if user was prompt to signin when they try to book an event,
             * redirect user back to that event to complete booking
             * after they sign in.
             */
            if(isset($_SESSION['current_event'])) {
                $_SESSION["user_id"] = $data["customerID"];
                // grab event_id from session
                $event_id = $_SESSION['current_event'];
                // clear the session
                unset($_SESSION['current_event']);
                // send user back to that event using the event id
                header("Location: ../../eventdetails.php?event_id=".$event_id);
            } else {

                // send user to homepage after succesfull login and exit
                header("Location: ../../index.php?login=success");
            }

            die();
        }

    } catch (PDOException $e) {
        die("Error Siging In: " . $e->getMessage());
    }

} else {
    header("Location: ../../pages/index.php");
    die();
}