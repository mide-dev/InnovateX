<?php 

$data = [];

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $query = "SELECT events.*, booking.* FROM booking
              JOIN events ON booking.eventID = events.eventID
              WHERE booking.customerID = :user_id";
    $stmt = $conn->prepare(($query));
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

}

?>