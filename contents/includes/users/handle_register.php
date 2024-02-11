<?php
/**
 * THHIS IS THE LOGIC TO SIGN UP A USER
 */

/**
 * Verify that a user initiated this php script using the "account register" form.
 * if not, send user back to homepage. this is to prevent a malicious user
 * from accessing the signup script directly.
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and save user inputs as variables with leading/trailing spaces removed
    $firstName = trim($_POST["firstname"]);
    $lastName = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $birthDate = trim($_POST["birth-day"]);
    $birthMonth = trim($_POST["birth-month"]);
    $birthYear = trim($_POST["birth-year"]);


    try {  
        require_once "../config/database.php";
        require_once "../config/session.php";
        require_once "./utils/user_auth.php"; 
        require_once "./utils/create_user.php";

        // FORM VALIDATION
        // array to store and display error(s) 
        $errors = [];
        
        // catch any empty field
        if (is_input_empty($firstName, $lastName, $email, $password, $birthDate)) {
            $errors["empty_input"] = "Please fill in all fields!";
        }
        // verify if email is in the right format
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Email is not valid!";
        }
        // verify if email already exists in db
        if (is_email_already_exist($conn, $email)) {
            $errors["email_exists"] = "An account with this email already exists.";
        }

        /**
         * If form validation catches any error, 
         * save error messages to session
         * and don't submit the form to db
         */
        if (count($errors) > 0) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../../register.php");
            die();

        } else { // if no errors, create the user TODO:extract this data in assoc array 
            create_user($conn, $firstName, $lastName, $password, $email, $birthDate, $birthMonth, $birthYear);

            // send user to login after succesfull signup and exit
            header("Location: ../../signin.php?register=success");
            die();
        }

    } catch (PDOException $e) {
        die("Error Signing Up: " . $e->getMessage());
    }

} else {
    header("Location: ../../index.php");
    die();
}

