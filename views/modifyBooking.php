<?php
        require_once ("controllers/User.php");
        $user = new UserController();
        $isAdmin = $user->isAdmin();

    if ($_SERVER['REQUEST_METHOD'] != 'POST' || !$isAdmin){
        header('Location: /?page=dashboard');
    }
    echo '<div id = "modifyBooking">';
    echo '<h1> Update Booking </h1>';
?>
<?php 

?>
    <div class="container">
        <?php 
            require_once ("controllers/Booking.php");
            $booking = new BookingController();
            $booking = $booking->getBookingByID($_POST['id']);            
            if ($booking){ 
                $datetime = new datetime($booking['booked_time']);
                $date = $datetime->format('Y-m-d');
                $time = $datetime->format('H:i:s');
                                
                ?> 
            <div id="book">
                <form action="/?page=dashboard" method="post">
                
                    <label for="date"> Date:</label>
                    <input type="date" name="date" id="start-date" required value="<?php echo $date?>">
                    <label for="hour"> Hour:</label>
                    <input type="time" name="hour" id="" required value="<?php echo $time?>">
                    <br>
                    <label for="pitch"> Select the pitch or pool: </label>
                    <select name="pitch" id="" required>
                        <option value="1" <?php if ($booking['pitch_id'] == '1') echo 'selected'; ?>> Basket court</option>
                        <option value="2" <?php if ($booking['pitch_id'] == '2') echo 'selected'; ?> > Basket court mini</option>
                        <option value="3" <?php if ($booking['pitch_id'] == '3') echo 'selected'; ?> > Football pitch</option>
                        <option value="4" <?php if ($booking['pitch_id'] == '4') echo 'selected'; ?> > Football pitch mini</option>
                        <option value="5" <?php if ($booking['pitch_id'] == '5') echo 'selected'; ?> > Hanball court </option>
                        <option value="6" <?php if ($booking['pitch_id'] == '6') echo 'selected'; ?> > Hanball court mini</option>
                        <option value="7" <?php if ($booking['pitch_id'] == '7') echo 'selected'; ?> > Swimming pool </option>
                        <option value="8" <?php if ($booking['pitch_id'] == '8') echo 'selected'; ?> > Swimming pool mini</option>
                        <option value="9" <?php if ($booking['pitch_id'] == '9') echo 'selected'; ?> > Rugby pitch </option>
                        <option value="10" <?php if ($booking['pitch_id'] == '10') echo 'selected'; ?> >Rugby pitch mini</option>
                        <option value="11" <?php if ($booking['pitch_id'] == '11') echo 'selected'; ?> >Tennis pitch </option>
                        <option value="12" <?php if ($booking['pitch_id'] == '12') echo 'selected'; ?> >Tennis pitch mini</option>
                        <option value="13"  <?php if ($booking['pitch_id'] == '13') echo 'selected'; ?> >Volleyball pitch </option>
                        <option value="14" <?php if ($booking['pitch_id'] == '14') echo 'selected'; ?> >Volleyball pitch mini</option>
                    </select>
                    <br>
                    <label for="duration"> Duration: </label>
                    <input type="number" name="duration" id="" class="duration" min="1" required value="1">
                    <fieldset required>
                        <input type="radio" name="offer" id="radio-hours" value="1" <?php if ($booking['offer_id'] == '1') echo 'checked'; ?> > <label for="radio-hours"> Hours </label>
                        <input type="radio" name="offer" id="radio-days" value="2" <?php if ($booking['offer_id'] == '2') echo 'checked'; ?>> <label for="radio-hours"> Days </label>
                        <input type="radio" name="offer" id="radio-months" value="3" <?php if ($booking['offer_id'] == '3') echo 'checked'; ?>> <label for="radio-hours"> Months </label>

                    </fieldset>
                    <input type="text" value="modify" name="operation" style="display:none;">
                    <input type="text" value="<?php echo $booking['id'];?>" name="booking_id" style="display:none;">
                    <button type="submit" class="submit"><?php echo 'MODIFY';?></button>
                    
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