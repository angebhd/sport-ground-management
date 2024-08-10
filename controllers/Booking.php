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
                    for ($i=0; $i < $duration; $i++) {   
                        if ($offer == 3){
                            $booked_time = date('Y-m-d H:i:s', $timestamp);
                            Booking::create($pitch, $_SESSION['user_id'], $booked_time, $offer);
                            $timestamp = strtotime('+1 month', $timestamp);
                        }
                        elseif($offer == 2){
                            $booked_time = date('Y-m-d H:i:s', $timestamp);
                            Booking::create($pitch, $_SESSION['user_id'], $booked_time, $offer);
                            $timestamp = strtotime('+1 day', $timestamp);
                        }else{
                            $booked_time = date('Y-m-d H:i:s', $timestamp);
                            Booking::create($pitch, $_SESSION['user_id'], $booked_time, $offer);
                            $timestamp = strtotime('+1 hour', $timestamp);
                        }           
                    }
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
    }

?>