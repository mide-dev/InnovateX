<?php
require_once __DIR__ . "/../includes/config/session.php";
?>
<header class="flex-between items-center container" data-container="header">
    <a href="./index.php">
        <img class="logo" src="../assests/media/Logo.svg" alt="InnovateX Logo">
    </a>
        <nav class="navbar" >
            <ul class="nav-links">
                <li><a href="./index.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="./events.php">Events</a></li>
                <li><a href="./credits.php">Credits</a></li>
            </ul>
        </nav>
        <div style="display: flex; " class="header-btn-wrapper">
            <?php if(isset($_SESSION["user_id"])) { ?>
                <a href="./myBookings.php" class="">Bookings</a>
                <a href="./profile.php" class="">Profile</a>
                <form action="./includes/users/handle_signout.php">
                    <button  type="submit" name="signout" class="btn btn-secondary">
                        Sign Out
                    </button>
                </form>
            <?php } else { ?> 
                <a href="./signin.php" class="btn btn-variant">
                    Sign In
                </a>
                <a href="./register.php" class="btn btn-primary">Register</a>
            <?php } ?>
        </div>
        <img class="mobile-menu" src="../assests/media/hamburger.svg" alt="menu">
    </header>