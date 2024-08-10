<?php
    echo '<div id = "dashboard">';
    echo '<h1> Dashboard </h1>';
?>

    <div class="container">
        <?php 
            require_once ("controllers/Booking.php");
            $bookings = new BookingController();
            $bookings = $bookings->getBookings();            
            if ($bookings){ ?> 
            <h2>All booking</h2>
            <table>
                <thread>
                    <tr>
                        <th> SN </th>
                        <th> Pitch </th>
                        <th> Client Name </th>
                        <th>Time booked</th>
                        <th> Offer </th>
                    </tr>
                </thread>
            
            <?php
                foreach ($bookings as $booking) { ?> 
                <tr>
                   <td> <?php echo $booking['SN'];?></td>
                   <td> <?php echo $booking['Pitches'];?></td>
                   <td> <?php echo $booking['Client Name'];?></td>
                   <td> <?php echo $booking['Booked time'];?></td>
                   <td> <?php echo $booking['Offer'];?></td>
                </tr>
                <?php   
                }
           } ?>
        </table>
    </div>

<?php
    echo '</div>';
?>