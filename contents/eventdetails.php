<?php
require_once "./includes/config/session.php";
require_once "./includes/config/database.php";
require_once "./includes/events/handle_event_details.php";
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
    <link rel="stylesheet" href="../assests/stylesheet/eventdetails.css">
</head>
<body>
    <?php include("./components/header.php");?>
    <!-- event-details Hero-->
    <main class="container section" data-section="event-details">
        <section class="event-details-section">
            <div class="flex-items margin-bottom">
                <img src="../assests/media/back.png" alt="">
                <a href="./events.php" class="back-to-events">
                    Back to Events
                </a>
            </div>
            <div class="event-hero-wrapper">
                <img class="event-hero-image-wrapper" style="object-fit: cover;" src="<?php echo $data['event_bannerpath']?>" alt="event banner image">
                <div class="event-hero-text-wrapper">
                    <h2 class="margin-bottom"><?php echo $data['event_title']?></h2>
                    <div class="event-detail-avatar flex-items margin-bottom">
                        <img class="avatar" src="<?php echo $data['author_imagepath']?>" alt="event speakers avatar">
                        <span>by Mathew Li</span>
                    </div>
                    <div class="event-details-date margin-bottom"><?php echo $formattedDate?></div>
                    <div class="event-details-time">Event starts: <?php echo $formattedTime?></div>
                </div>
            </div>
        </section>
        <!-- event details desc -->
        <section class="event-details-section">
            <div class="event-wrapper">
                <div class="event-details">
                    <div class="event-desc-wrapper">
                        <div class="event-desc-left">
                            <div class="event-desc-about">
                                <h3 class="margin-bottom">About this Event</h3>
                                <p><?php echo $data['description_long']?></p>
                            </div>
                            <div class="margin-bottom-lg">
                                <h3 class="margin-bottom">Who can attend?</h3>
                                <p>
                                    Our event is open to anyone aged 15 and above with an interest in entrepreneurship, motivation, and business. 
                                    Whether you're a seasoned entrepreneur, a budding business enthusiast, or someone seeking motivation, you're welcome to join!
                                </p>
                            </div>
                        </div>
                        <div class="event-desc-right">
                            <div class="event-venue-wrapper">
                                <h3 class="margin-bottom-sm">Event Venue</h3>
                                <div class="flex-items margin-bottom-sm">
                                    <img src="../assests/media/PlaceMarker.png" alt="">
                                    <p><?php echo $data['event_venue']?></p>
                                </div>
                                <div class="flex-items">
                                    <img src="../assests/media/Signpost.png" alt="">
                                    <p>Get directions</p>
                                </div>
                            </div>
                            <div class="event-capacity-wrapper">
                                <h3 class="margin-bottom-sm">Venue Capacity</h3>
                                <div class="flex-items">
                                    <img src="../assests/media/People.png" alt="">
                                    <p class="event-capacity"><?php echo $data['venue_capacity']?></p>
                                </div>
                            </div>
                            <div class="event-fee-wrapper flex-items">
                                <p class="event-fee-title">Ticket Price:</p>
                                <p class="event-price">£<?php echo $data['price_per_person']?></p>
                            </div>
                        </div>
                    </div>
                    <form action="./includes/events/handle_bookevent_btn.php" method="post">
                        <?php if (is_event_booked_already($conn)) {?>
                            <button class="btn book-event" name="book-event" disabled>You allready booked this Event</button>
                        <?php } else {?>
                            <button class="btn cta-btn book-event" name="book-event">Book Event</button>
                        <?php }?>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php include("./components/footer.php");?>
</body>
</html>