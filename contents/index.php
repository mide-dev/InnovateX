<?php
    require_once "./includes/config/database.php";
    require_once "./includes/users/utils/user_auth.php";  
    require_once "./includes/events/handle_events.php";
    require_once "./components/eventCard.php";
    // get featured events
    $data = get_events($conn, $only_featured_events=true);
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
        <link rel="stylesheet" href="../assests/stylesheet/auth.css">
    </head>
<body>
    <?php
        include("./components/header.php");
    ?>
    <main>
        <!-- HERO SECTION -->
        <section class="section" data-section="hero">
            <div class="container hero-wrapper">
                <?php is_auth_error_or_success();?>
                <div class="hero-text-wrapper">
                    <small class="hero-pre-title">EVENTS HOSTED BY <strong>100+ WORLD INVESTORS🔥</strong></small>
                    <h1 class="hero-text"> Discover Ideas  Worth Spreading</h1>
                    <p class="hero-subtext">
                        Unlock. Inspire. Transform.
                    </p>
                    <div class="hero-btn-wrapper">
                        <a href="./events.php" class="btn btn-primary">See All Events</a>
                        <button class="btn btn-secondary">
                            <img src="../assests/media/play.svg" alt="watch event introduction video">
                            Watch the teaser
                        </button>
                    </div>
                    <div class="hero-event-info-wrapper">
                        <p class="hero-event-date">Next Talk - A Millennial's unexpected secret to success.</p>
                        <span class="hero-event-location">
                            <img src="../assests/media/ukflag.svg" alt="UK flag Icon">
                            <p>Grand Horizon Center, United Kingdom</p>
                        </span>
                    </div>
                </div>
                <!--  -->
                <div class="hero-img-wrapper hero-img-background-pattern"> 
                    <!-- card 1 -->
                    <div class="card" data-card="hero" data-card-position="top">
                            <div class="avatar-wrapper" data-attendees="true">
                                <img class="avatar" src="../assests/media/placeholder.jpg" alt="hosted events count">
                                <img class="avatar" src="../assests/media/placeholder.jpg" alt="hosted events count">
                                <img class="avatar" src="../assests/media/placeholder.jpg" alt="hosted events count">
                                <div class="avatar-text" data-attendees="true">
                                    <span class="test">2k+</span> 
                                    <span>Events</span>
                                </div>
                            </div>
                        <img class="card-img" src="../assests/images/1.jpg"/>
                        <div class="card-text">
                            <p class="card-text-title">Vision Pro Event, <span class="card-text-company">Apple</span></p>
                        </div>
                    </div>
                    <!-- card 2 -->
                    <div class="card" data-card="hero" data-card-position="bottom">
                        <img class="card-img" src="../assests/images/12.jpg"/>
                        <div class="card-text">
                            <p class="card-text-title">Sundar Pichai, <span class="card-text-company">Google</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ABOUT SECTION -->
        <section class="section background-variant" id="about">
            <div class="container about-section">
                <div class="about-text">
                    <h2 class="text-light">More than just Events</h2>
                    <p class="about-desc text-light">We are the ultimate destination for visionaries, 
                        entrepreneurs, and thought leaders. Our mission is to foster innovation, 
                        encourage collaboration, and spark inspiration in the ever-evolving landscape 
                        of business and entrepreneurship. we're dedicated to creating a platform that 
                        cultivates fresh ideas and connects innovators from around the world. 
                    </p>
                    <button class="btn about-btn">Meet the Team</button>
                </div>
                <img class="about-img" src="../assests/images/team.jpg" alt="">
            </div>
        </section>
        <!-- AGENDA SECTION -->
        <section class="section event-wrapper container">
            <h2 class="text-align-center padding-bottom">Upcoming Talks</h2>
            <div class="card-grid">
                <?php
                    // loop through the event data from "handle_events.php"
                    foreach ($data as $event) {
                        // save the values in an associative array
                        $eventContent = [
                            'event_id' => $event['eventID'],
                            'event_date' => $event['event_date'],
                            'event_title' => $event['event_title'],
                            'event_imagepath' => $event['event_imagepath'],
                            'description' => $event['description'],
                            'author_name' => $event['author_name'],
                            'author_imagepath' => $event['author_imagepath']
                        ];
                        // print out the events
                        echo generateEventCardHTML($eventContent);
                    }
                ?> 
            </div>    
            <div class="event-btn-wrapper">
                <a href="./events.php" class="btn btn-variant ">
                    <span>View all Events</span>
                    <img src="../assests/media/arrow-variant.svg" alt="">
                </a>
            </div>
        </section>
        <!-- MEDIA PARTNERS -->
        <section class="section background-variant" id="sponsors">
            <div class="container">
                <h2 class="text-light text-align-center padding-bottom">Media Partners</h2>
                <div class="partner-wrapper">
                    <img class="partner-logo aws" src="../assests/media/aws_logo.svg" alt="">
                    <img class="partner-logo" src="../assests/media/apple_logo.svg" alt="">
                    <img class="partner-logo samsung" src="../assests/media/samsung_logo.svg" alt="">
                    <img class="partner-logo" src="../assests/media/ibm_logo.svg" alt="">
                    <img class="partner-logo" src="../assests/media/visa_logo.svg" alt="">
                    <img class="partner-logo" src="../assests/media/uber_logo.svg" alt="">
                </div>
            </div>
        </section>
        <!-- CTA -->
        <section class="section container">
            <div class="cta-bg">
                <div>
                    <h2>Join the biggest Events of the Year</h2>
                    <p class="cta-description">We are committed to empowering the business leaders and 
                        entrepreneurs of the future. Together, let's shape a brighter tomorrow.
                    </p>
                </div>
                <a href="./events.php" class="btn cta-btn">See All Events</a>
            </div>
        </section>
    </main>
</body>
</html>

<?php
    include("./components/footer.php");
?>