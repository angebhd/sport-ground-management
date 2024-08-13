<?php
        require_once ("controllers/User.php");
        $user = new UserController();
        $isAdmin = $user->isAdmin();

    if ($_SERVER['REQUEST_METHOD'] != 'POST' || !$isAdmin){
        header('Location: /?page=dashboard');
    }
    echo '<div id = "modifyBooking">';
    echo '<h1> Delete Booking </h1>';
?>
<?php 

?>
    <div class="container">
        <?php 
            require_once ("controllers/Booking.php");
            $booking = new BookingController();
            $booking = $booking->getOneBooking($_POST['id']);            
            if ($booking){ 
                               
                ?> 
            <div id="book">
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
                    <tr>
                        <td> <?php echo $booking['SN'];?></td>
                        <td> <?php echo $booking['Pitches'];?></td>
                        <td> <?php echo $booking['Client Name'];?></td>
                        <td> <?php echo $booking['Booked time'];?></td>
                        <td> <?php echo $booking['Duration']; echo' '; echo $booking['Duration_unit']; if($booking['Duration']>1) echo 's';?></td>
                        <td> <?php echo $booking['Offer'];?></td>
                    </tr>
                </table>
                
                
                    
                    <form action="/?page=dashboard" method="post" style="padding:0; margin-top:20px; border:none; background-color:white;">
                    <input type="text" value="delete" name="operation" style="display:none;">
                    <input type="text" value="<?php echo $_POST['id'];?>" name="booking_id" style="display:none;">
                    <button type="submit" class="submit" style="background-color:red;color:white;"><?php echo 'DELETE';?></button>
                    
                </form>
            </div>
           
                <?php 
           }else{ header('Location: /?page=dashboard'); } ?>
        <br><br>
    </div>
<br><br>
<?php
    echo '</div>';
?>