<?php 
    class BookingController {

        public function create(){
            $methodReq = $_SERVER['REQUEST_METHOD'];
            if ($methodReq == 'POST'){
                $date = $_POST['date'];
                $hour = $_POST['hour'];
                $pitch = (int)$_POST['pitch'];
                $duration = (int)$_POST['duration'];
                $offer = (int)$_POST['offer'];

                $booked_time = $date . ' ' . $hour;
                $booked_time = date('Y-m-d H:i:s', strtotime($booked_time));

                if (isset($_SESSION['user_id'])){
                    require_once ("models/Booking.php");
                    for ($i=0; $i < $duration; $i++) {                    
                        Booking::create($pitch, $_SESSION['user_id'], $booked_time, $offer);
                    }
                    return true;
                } else{
                    echo "<script>alert(\"To book a pitch, you have to login\")</script>";
                    return false;
                        
                } 
            }
        }

    }

?>