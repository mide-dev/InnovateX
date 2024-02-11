<?php
require_once __DIR__ . "/../config/session.php";
require_once __DIR__ . "/../config/database.php";
require_once "../users/utils/user_auth.php"; 
require_once "../users/utils/select_user.php"; 
require_once "../users/utils/update_user.php"; 

// IF profile update form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Extract and save user inputs as variables with leading/trailing spaces removed
        $firstName = trim($_POST["firstname"]);
        $lastName = trim($_POST["lastname"]);
        $email = trim($_POST["email"]);
        $oldPassword = trim($_POST["old-password"]);
        $newPassword = trim($_POST["new-password"]);
        $bio = trim($_POST["bio"]);
        $profileAvatar = isset($_POST['profile-avatar']) ? $_POST['profile-avatar'] : 1;

        // FORM VALIDATION
        $errors = [];

        // Validate empty fields
        foreach (['firstName', 'lastName', 'email', 'bio'] as $field) {
            if (is_input_empty($$field)) {
                $errors["empty_input"] = ucfirst($field) . " cannot be empty";
            }
        }

        // Verify if email is in the right format
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Email is not valid!";
        }

        // Get user_id from session
        $user_id = $_SESSION['user_id'];
        // Get the user info from the database
        $user_data = select_user_with_id($conn, $user_id);

        function update_user_in_db($conn, $errors, $with_pwd, $user_id, $firstName, $lastName, $email, $bio, $profileAvatar, $newPassword = null) {
            if (count($errors) > 0) {
                $_SESSION["errors_update_profile"] = $errors;
                header("Location: ../../profile.php?edit-profile&update-error");
                die();
            } else {
                if ($with_pwd) {
                    update_user_with_pwd($conn, $user_id, $firstName, $lastName, $email, $bio, $profileAvatar, $newPassword);
                } else {
                    update_user_without_pwd($conn, $user_id, $firstName, $lastName, $email, $bio, $profileAvatar);
                }
            }
        }

        // Check if password input contains a value
        // which means the user wants to change the password
        if (!empty($oldPassword)) {
            // If the user's old password is correct, proceed to check for any form error
            if (password_verify($oldPassword, $user_data['password_hash'])) {
                update_user_in_db($conn, $errors, true, $user_id, $firstName, $lastName, $email, $bio, $profileAvatar, $newPassword);
                // Reload profile page on update success
                header("Location: ../../profile.php?update-success");
                die();
            } else {
                $errors["wrong_password"] = "Incorrect Password!";
                $_SESSION["errors_update_profile"] = $errors;
                header("Location: ../../profile.php?edit-profile&update-error");
                die();
            }
        } else {
            // The user does not want to change the password, update changes in the database without the password
            update_user_in_db($conn, $errors, false, $user_id, $firstName, $lastName, $email, $bio, $profileAvatar);
            // Reload profile page on update success
            header("Location: ../../profile.php?update-success");
            die();
        }
    } catch (PDOException $e) {
        die("Error Updating Profile: " . $e->getMessage());
    }
}
?>
