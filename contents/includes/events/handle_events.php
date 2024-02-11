<?php   
    try {
        require_once __DIR__ . "/../config/database.php";

        function get_events($conn, $only_featured_events=false) {
            // todays date
            $current_date = date("Y-m-d");
            $query='';

            if ($only_featured_events) {
                /**
                 * for events that'll be displayed as featured events
                 * on the homepage. choose max of 8 random events with
                 * future dates. 
                 */
                $query = "SELECT * FROM events WHERE event_date >= :current_date ORDER BY RAND() LIMIT 8;";
            } else {
                //get all events with current and future date 
                $query = "SELECT * FROM events WHERE event_date >= :current_date;";
            }

            // prepare, bind and execute query
            $stmt = $conn->prepare(($query));
            $stmt->bindParam(":current_date", $current_date);
            $stmt->execute();
            // fetch the data
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        }

    } catch (PDOException $e) {
        die("Error displaying events: " . $e->getMessage());
    }
?>