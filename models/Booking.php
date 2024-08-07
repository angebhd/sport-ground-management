<?php 

    class Booking{

        public static function getAll(){
            require_once ("DBconnection.php");
            $db = new DBconnection();
            $db = $db->getConnection();
            $statement = $db->prepare("SELECT * FROM booking");
            $statement->execute();
            return $statement->fetchAll();
        }

        public static function create($pitch, $user, $booked_time, $offer){
            require_once ("DBconnection.php");
            $db = new DBconnection();
            $db = $db->getConnection();

            $statement = $db->prepare("INSERT INTO booking (pitch_id, user_id, booked_time, offer_id) VALUES (:pitch, :user, :booked_time, :offer)");
            $statement->bindParam(':pitch', $pitch);
            $statement->bindParam(':user', $user);
            $statement->bindParam(':booked_time', $booked_time);
            $statement->bindParam(':offer', $offer);
            $statement->execute();
        }
        public function userBooking($user_id){

            require_once ("DBconnection.php");
            $db = new DBconnection();
            $db = $db->getConnection();
            $statement = $db->prepare("SELECT * FROM booking WHERE user_id =:user_id");
            $statement->execute([':user_id' => $user_id]);
            return $statement->fetchAll();


        }


    }
?>