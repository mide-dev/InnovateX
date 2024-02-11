<?php
    require_once "./includes/config/session.php";
    require_once "./includes/users/utils/user_auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnovateX</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assests/stylesheet/styles.css">
    <link rel="stylesheet" href="../assests/stylesheet/register.css">
</head>
<body>
    <?php include("./components/header.php");?>
    <!-- Register -->
    <section class="register-wrapper section container">
        <h2>Create Account</h2>
        <?php is_auth_error_or_success();?>
        <form action="./includes/users/handle_register.php" method="post">
            <div class="account-name">
                <div class="name-wrapper">
                    <label>First Name</label>
                    <input type="text" name="firstname" required placeholder="John">
                </div>
                <div class="name-wrapper">
                    <label>Last Name</label>
                    <input type="text" name="lastname" required placeholder="Doe">
                </div>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" required placeholder="johndoe@gmail.com">
            </div>
            <div>
                <label>Password</label>
                <input type="password" required name="password">
            </div>
            <div class="dob-wrapper">
                <label>Date of Birth</label>
                <div class="dob">
                    <select id="birth-day" name="birth-day">
                        <option disabled selected>Day</option>
                    </select>
                    <select id="birth-month" name="birth-month">
                        <option disabled selected>Month</option>
                    </select>
                    <input type="number" min="1900" max="2099" step="1" name="birth-year" placeholder="Year" required>
                </div>
            </div>
            <button class="btn btn-register" type="submit" name="register">Register</button>
        </form>
        <div class="form-nav">
            <span>Already have an account?</span>
            <a href="./signin.php">Sign In</a>
        </div>
    </section>
    <script src="./scripts/registerScript.js"></script>
        <?php include("./components/footer.php");?>
</body>
</html>
