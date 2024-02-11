<?php   
require_once __DIR__ . "/../config/session.php";
require_once __DIR__ . "/../config/database.php";

if (isset($_SESSION['user_id'])) {
    $current_user_id = $_SESSION['user_id'];

    $query = "SELECT * FROM customers WHERE customerID = :current_user_id;";

    // prepare, bind and execute query
    $stmt = $conn->prepare(($query));
    $stmt->bindParam(":current_user_id", $current_user_id);
    $stmt->execute();
    // fetch the data
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    // convert date format
    $dob = new DateTime($data['date_of_birth']);
    $formatted_dob = $dob->format("F d, Y");

    $date_joined = new DateTime($data['date_joined']);
    $formatted_date_joined = $date_joined->format("F d, Y");

} else {
    header("Location: ../pages/signin.php");
    die();
}
?>  