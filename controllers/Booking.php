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
                $timestamp = strtotime($booked_time);

                if (isset($_SESSION['user_id'])){
                    require_once ("models/Booking.php");
                    Booking::create($pitch, $_SESSION['user_id'], $booked_time, $duration, $offer);
                    
                    return true;
                } else{
                    echo "<script>alert(\"To book a pitch, you have to login\")</script>";
                    return false;
                        
                } 
            }
        }
        public function getBookings(){
            require_once("models/Booking.php");
            require_once('models/User.php');
            $bookings = new Booking();
            $user = new User();
            $user = $user->getUserRole($_SESSION['user_id']);
            $role = (int)$user['role'];
            if ($role == 2){
                return $bookings->getAll();
            }
            else{
                return $bookings->userBooking($_SESSION['user_id']);
            }
        }
        public function getBookingByID($id){
            require_once("models/Booking.php");
            $booking = new Booking();
            return $booking->onebooking($id);
        }
        public function getOneBooking($id){
            require_once("models/Booking.php");
            $booking = new Booking();
            return $booking->getOneBooking($id);
        }

        public function updateBookingByID($id){
            $date = $_POST['date'];
            $hour = $_POST['hour'];
            $pitch = (int)$_POST['pitch'];
            $duration = (int)$_POST['duration'];
            $offer = (int)$_POST['offer'];

            $booked_time = $date . ' ' . $hour;

            require_once("models/Booking.php");
            $booking = new Booking();
            return $booking->updateOneBooking($booked_time, $duration, $pitch, $offer, $id);
        }
        public function deleteBookingByID($id){
            require_once("models/Booking.php");
            $booking = new Booking();
            return $booking->deleteOne($id);
        }
    }

?>