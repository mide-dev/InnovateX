<?php
    require_once "./includes/config/session.php";
    require_once "./includes/config/database.php";
    require_once "./includes/events/handle_events.php";
    require_once "./components/eventCard.php";

    // get all events
    $data = get_events($conn, $only_featured_events=false);
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
</head>
<body>
    <?php include("./components/header.php");?>
    <!-- main -->
    <main class="section event-wrapper container">
        <h2 class="text-align-center padding-bottom">All Events</h2>
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
            <p>Can't find an event you like? Come back in 24 hours, and we'll have more options for you!</p>
        </div>
    </main>
    <?php
        include("./components/footer.php");
    ?>
</body>
</html>




<!-- card 2 -->
                <!-- <div class="event-card">
                    <div class="flex-between">
                        <div class="event-time">March, 29th</div>
                        <img class="event-link" src="../assests/Arrow 1.svg" alt="">
                    </div>
                    <div class="event-card-content">
                        <div class="event-desc-wrapper">
                            <h4 class="event-card-title text-light">Gen Z Entrepreneurs</h4>
                            <img class="event-img" src="../assests/images/pexels-rica-naypa-3155723.jpg" alt="">
                            <p class="event-desc text-light">
                                Meet the young and ambitious Gen Z entrepreneurs who are revolutionizing industries.
                            </p>
                        </div>
                        <div class="event-host-wraper">
                            <img class="avatar" src="../assests/images/pexels-rica-naypa-3155723.jpg" alt="event speakers avatar">
                            <p class="avatar-text text-light">By Rica Naypa</p>
                        </div>
                    </div>
                </div> -->
                <!-- card 3 -->
                <!-- <div class="event-card">
                    <div class="flex-between">
                        <div class="event-time">April, 2nd</div>
                        <img class="event-link" src="../assests/Arrow 1.svg" alt="">
                    </div>
                    <div class="event-card-content">
                        <div class="event-desc-wrapper">
                            <h4 class="event-card-title text-light">A 40-Year Plan for Sustainable Power</h4>
                        
                            <img class="event-img" src="../assests/images/pexels-pavel-danilyuk-8438918.jpg" alt="">
                            <p class="event-desc text-light">
                                Embark on a 40-year journey into the future of energy. 
                        </p>
                        </div>
                        <div class="event-host-wraper">
                            <img class="avatar" src="../assests/images/pexels-pavel-danilyuk-8438918.jpg" alt="event speakers avatar">
                            <p class="avatar-text text-light">By Pavel Danilyuk</p>
                        </div>
                    </div>
                </div> -->
                <!-- card 4 -->
                <!-- <div class="event-card">
                    <div class="flex-between">
                        <div class="event-time">July, 31st</div>
                        <img class="event-link" src="../assests/Arrow 1.svg" alt="">
                    </div>
                    <div class="event-card-content">
                        <div class="event-desc-wrapper">
                            <h4 class="event-card-title text-light">Amazon's Boiling River</h4>
                            <img class="event-img" src="../assests/images/pexels-henri-mathieusaintlaurent-8345978.jpg" alt="">
                            <p class="event-desc text-light">
                                Explore the scientific marvels and environmental significance of this natural wonder.
                            </p>
                        </div>
                        <div class="event-host-wraper">
                            <img class="avatar" src="../assests/images/pexels-henri-mathieusaintlaurent-8345978.jpg" alt="event speakers avatar">
                            <p class="avatar-text text-light">By Henri Mathieu</p>
                        </div>
                    </div>
                </div> -->
                <!-- card 5 -->
                <!-- <div class="event-card">
                    <div class="flex-between">
                        <div class="event-time">August, 23rd</div>
                        <img class="event-link" src="../assests/Arrow 1.svg" alt="">
                    </div>
                    <div class="event-card-content">
                        <div class="event-desc-wrapper">
                            <h4 class="event-card-title text-light">Silicon Valley HR Insights: Learning from Start-Up Titans</h4>
                        
                            <img class="event-img" src="../assests/images/pexels-henri-mathieusaintlaurent-8344902.jpg" alt="">
                            <p class="event-desc text-light">
                                Delve into HR lessons drawn from the dynamic world of Silicon Valley start-ups. 
                            </p>
                        </div>
                        <div class="event-host-wraper">
                            <img class="avatar" src="../assests/images/pexels-henri-mathieusaintlaurent-8344902.jpg" alt="event speakers avatar">
                            <p class="avatar-text text-light">By Rose Goldenberg</p>
                        </div>
                    </div>
                </div> -->
                <!-- card 6 -->
                <!-- <div class="event-card">
                    <div class="flex-between">
                        <div class="event-time">September, 6th</div>
                        <img class="event-link" src="../assests/Arrow 1.svg" alt="">
                    </div>
                    <div class="event-card-content">
                        <div class="event-desc-wrapper">
                            <h4 class="event-card-title text-light">Sustainable Cities: Building Tomorrow's Urban Oases</h4>
                        
                            <img class="event-img" src="../assests/images/pexels-祝-鹤槐-716276.jpg" alt="">
                            <p class="event-desc text-light">
                                Discover innovative solutions and green initiatives transforming cities into eco-friendly hubs.
                            </p>
                        </div>
                        <div class="event-host-wraper">
                            <img class="avatar" src="../assests/images/pexels-祝-鹤槐-716276.jpg" alt="event speakers avatar">
                            <p class="avatar-text text-light">By Sam Friedman</p>
                        </div>
                    </div>
                </div> -->
                <!-- card 7 -->
                <!-- <div class="event-card">
                    <div class="flex-between">
                        <div class="event-time">September, 8th</div>
                        <img class="event-link" src="../assests/Arrow 1.svg" alt="">
                    </div>
                    <div class="event-card-content">
                        <div class="event-desc-wrapper">
                            <h4 class="event-card-title text-light">Blue Economy: Sailing Towards Oceanic Innovation</h4>
                        
                            <img class="event-img" src="../assests/images/pexels-thisisengineering-3861962.jpg" alt="">
                            <p class="event-desc text-light">
                                Discover groundbreaking technologies and initiatives for a cleaner, healthier ocean.
                            </p>
                        </div>
                        <div class="event-host-wraper">
                            <img class="avatar" src="../assests/images/pexels-thisisengineering-3861962.jpg" alt="event speakers avatar">
                            <p class="avatar-text text-light">By Jumoke Badmos</p>
                        </div>
                    </div>
                </div> -->
                <!-- card 8 -->
                <!-- <div class="event-card">
                    <div class="flex-between">
                        <div class="event-time">September, 19th</div>
                        <img class="event-link" src="../assests/Arrow 1.svg" alt="">
                    </div>
                    <div class="event-card-content">
                        <div class="event-desc-wrapper">
                            <h4 class="event-card-title text-light">Creativity builds nations</h4>
                        
                            <img class="event-img" src="../assests/images/pexels-diva-plavalaguna-6150527.jpg" alt="">
                            <p class="event-desc text-light">
                                Explore how to reinvent your creative process for groundbreaking results.
                            </p>
                        </div>
                        <div class="event-host-wraper">
                            <img class="avatar" src="../assests/images/pexels-diva-plavalaguna-6150527.jpg" alt="event speakers avatar">
                            <p class="avatar-text text-light">By Diva Plavalaguna</p>
                        </div>
                    </div>
                </div> -->