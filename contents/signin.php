<?php
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
    <link rel="stylesheet" href="../assests/stylesheet/auth.css">
</head>
<body>
    <?php
        include("./components/header.php");
    ?>

    </div>
    <!-- Signin -->
    <section class="register-wrapper section">
        <?php is_auth_error_or_success();?>
        <?php is_user_signed_in();?>
        <h2>Welcome Back,</h2>
        <span>We're so excited to see you again!</span>
        <form action="./includes/users/handle_signin.php" method="post" data-signin="true">
            <div>
                <label>Email</label>
                <input type="email" name="email" placeholder="johndoe@gmail.com" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required placeholder="********">
            </div>
            <button class="btn btn-register" type="submit">Sign In</button>
        </form>
        <div class="form-nav">
            <span>Need an account?</span>
            <a href="./register.php">Register</a>
        </div>
    </section>
</body>
    <?php
        include("./components/footer.php");
    ?>
</html>
