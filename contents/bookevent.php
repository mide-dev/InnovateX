<?php 
require_once "./includes/config/session.php";
require_once "./includes/events/populate_bookevent_form.php";
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
    <link rel="stylesheet" href="../assests/stylesheet/booking.css">
</head>
<body>
    <?php include("./components/header.php");?>
    <!-- booking form -->
    <section class="container booking-details">
        <h3><?php echo $data['event_title']?></h3>
        <?php is_booking_successfull();?>
        <form action="./includes/events/submit_eventbooking_to_db.php" method="post">
            <div class="margin-bottom-md">
                <label>Register Name for Event</label>
                <input type="text" name="user-name" value="<?php echo $current_user_name?>">
                <small>*Edit this to use another name other than profile name</small>
            </div>
            <div class="margin-bottom-md">
                <label>Phone Number</label>
                <input type="tel" name="phone-number" placeholder="01234 567890" required>
            </div>
            <div class="margin-bottom-md">
                <label>Booking Notes</label>
                <input type="text" name="booking-notes" placeholder="any notes?...">
            </div>
            <div class="form-ticket margin-bottom-md">
                <div>
                    <span>Price:</span>
                    <span>&pound;</span>
                    <span id="price-per-person"><?php echo $data['price_per_person']?></span>
                    <input type="hidden" id="price-per-person-inp" name="price_per_person">
                </div>
                <label>No of Tickets:</label>
                <input type="number" min="1" max="20" step="1" value="1" name='no-of-tickets' id="no-of-ticket">
            </div>
            <div class="form-vat margin-bottom-md">
                <div>
                    <span>Vat Amount: &pound;</span>
                    <span id="vat-amount"></span>
                    <input type="hidden" id="vat-amount-inp" name="vat_amount">
                </div>
            </div>
            <div class="flex-between">
                <span>Total Amount:</span>
                <div>
                <span>&pound;</span>
                <span id="total-booking-fee"></span>
                <input type="hidden" id="total-booking-fee-inp" name="total_booking_fee">
                </div>
                
            </div>
            <button class="btn btn-register" name="finalize-bookings" type="submit">PAY & FINALIZE BOOKINGS</button>
        </form>
        <script>
            // script to calculate total ticket fee
           let bookingFee = parseFloat(<?php echo $event_fee; ?>);
            const noOfTicket = document.getElementById('no-of-ticket');
            const pricePerPerson = document.getElementById('price-per-person');
            const pricePerPersonInput = document.getElementById('price-per-person-inp');
            const vat = document.getElementById('vat-amount');
            const vatInput = document.getElementById('vat-amount-inp');
            const totalFee = document.getElementById('total-booking-fee');
            const totalFeeInput = document.getElementById('total-booking-fee-inp');

            pricePerPersonInput.value = bookingFee;
            // Initial vat for a single ticket
            vatInput.value = vat.innerHTML = (bookingFee * 0.2).toFixed(2);
            updateTotalFee();

            const onUnitPriceChange = () => {
                // Update booking fee when the number of tickets is changed
                pricePerPerson.innerText = (parseFloat(noOfTicket.value) * bookingFee).toFixed(2);
                // Update vat
                vatInput.value = vat.innerHTML = (pricePerPerson.innerText * 0.2).toFixed(2);
                updateTotalFee();
            };

            function updateTotalFee() {
                // Update total fee based on price per person and vat
                totalFeeInput.value = totalFee.innerHTML = (parseFloat(pricePerPerson.innerText) + parseFloat(vat.innerText)).toFixed(2);
            }

            noOfTicket.addEventListener('input', onUnitPriceChange);

        </script>
    </section>
    <?php include("./components/footer.php");?>
</body>
</html>