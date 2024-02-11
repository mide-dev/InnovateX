<?php

/**
 * This function generate an html card for events
 */
function generateEventCardHTML($event) {
    $html = '<a href="eventdetails.php?event_id=' . $event['event_id'] . '" class="event-card">'; 
    $html .= '<div class="flex-between">';
    $html .= '<div class="event-time">' . date('F jS', strtotime($event['event_date'])) . '</div>';
    $html .= '<img class="event-link" src="../../assests/media/Arrow 1.svg" alt="">';
    $html .= '</div>';
    $html .= '<div class="event-card-content">';
    $html .= '<div class="event-desc-wrapper">';
    $html .= '<h4 class="event-card-title text-light">' . $event['event_title'] . '</h4>';
    $html .= '<img class="event-img" src="' . $event['event_imagepath'] . '" alt="">';
    $html .= '<p class="event-desc text-light">' . $event['description'] . '</p>';
    $html .= '</div>';
    $html .= '<div class="event-host-wraper">';
    $html .= '<img class="avatar" src="' . $event['author_imagepath'] . '" alt="event speakers avatar">';
    $html .= '<p class="avatar-text text-light">By ' . $event['author_name'] . '</p>'; //TODO: AVARTAR TEXT
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</a>';

    return $html;
}
