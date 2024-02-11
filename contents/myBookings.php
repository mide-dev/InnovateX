<?php
    require_once "./includes/config/session.php";
    require_once "./includes/config/database.php";
    require_once "./includes/events/handle_events.php";
    require_once "./includes/events/handle_myBookings.php";
    require_once "./components/eventCard.php";
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
    <link rel="stylesheet" href="../assests/stylesheet/event.css">
    <link rel="stylesheet" href="../assests/stylesheet/mybookings.css">
</head>
<body>
    <?php include("./components/header.php");?>
    <!-- main -->
    <main class="section event-wrapper container">
        <h2 class="text-align-center padding-bottom">Events You've Booked</h2>
        <div class="card-grid">
            <?php
            if (count($data) > 0) {
                // loop through the event data from "handle_myBookings.php" and display to user
                foreach ($data as $event) {
                    echo '<a href="eventdetails.php?event_id=' . $event['eventID'] . '" class="bookings-wrapper">';
                    echo '<div class="event-desc-wrapper margin-bottom">';
                    echo '<h4 class="event-card-title">' . $event['event_title'] . '</h4>';
                    echo '<img class="event-img" src="' . $event['event_imagepath'] . '" alt="">';
                    echo '</div>';
                    echo '<div class="flex-between margin-bottom">';
                    echo '<div class="event-host-wraper">';
                    echo '<img class="avatar" src="' . $event['author_imagepath'] . '" alt="event speakers avatar">';
                    echo '<p class="avatar-text">By ' . $event['author_name'] . '</p>';
                    echo '</div>';
                    echo '<div class="flex-between">';
                    echo '<div>' . date('F jS', strtotime($event['event_date'])) . '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="margin-bottom">';
                    echo '<span class="booking-label">Registered Name: </span>';
                    echo '<span>' . $event['registered_name'] . '</span>';
                    echo '</div>';
                    echo '<div class="margin-bottom">';
                    echo '<span class="booking-label">No of Ticket(s) bought: </span>';
                    echo '<span>' . $event['number_people'] . '</span>';
                    echo '</div>';
                    echo '<div class="margin-bottom">';
                    echo '<span class="booking-label">Total Paid (Inc. VAT): </span>';
                    echo '<span>&pound;' . $event['total_booking_cost'] . '</span>';
                    echo '</div>';
                    echo '</a>';
                }
            } else {
                echo "<div class='no-bookings'>You haven't booked any Event. When you do, they'll appear here.</div>";
            }
            ?>
        </div>

    </main>
    <?php
        include("./components/footer.php");
    ?>
</body>
</html>