
<?php
    echo '<div id = "dashboard">';
    echo '<h1> Dashboard </h1>';
?>
<?php 
        require_once ("controllers/User.php");
        $user = new UserController();
        $isAdmin = $user->isAdmin();

?>
    <div class="container">
        <?php 
            require_once ("controllers/Booking.php");
            $bookings = new BookingController();
            $bookings = $bookings->getBookings();            
            if ($bookings){ ?> 
            <h2>Bookings</h2>
            <table>
                <thread>
                    <tr>
                        <th> ID </th>
                        <th> Pitch </th>
                        <th> Client Name </th>
                        <th>Time booked</th>
                        <th> Duration </th>
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
                   <td> <?php echo $booking['Duration']; echo' '; echo $booking['Duration_unit']; if($booking['Duration']>1) echo 's';?></td>
                   <td> <?php echo $booking['Offer'];?></td>
                   <?php  if ($isAdmin){ ?> 
                            <td><form action="/?page=modifyBooking" method="post"><input type="number" name="id" id="" value="<?php echo $booking['SN'];?>" style="display:none;"  ><button type="submit" class="modify" > Modify</button></form></td>
                            <td><form action="/?page=deleteBooking" method="post"><input type="number" name="id" id="" value="<?php echo $booking['SN'];?>" style="display:none;"  ><button type="submit" class="delete" > Delete</button></form></td>
                        <?php  } ?>
                </tr>
                <?php   
                }
           } ?>
        </table>
        <br><br>
    </div>
<br><br>
<?php
    echo '</div>';
?>