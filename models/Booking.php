<?php 

    class Booking{

        public static function getAll(){
            require_once ("DBconnection.php");
            $db = new DBconnection();
            $db = $db->getConnection();
            $statement = $db->prepare('SELECT b.id AS SN, p.name AS Pitches, CONCAT(u.fname, " ", u.lname) AS "Client Name", b.booked_time AS "Booked time", o.name AS "Offer"  FROM booking AS b INNER JOIN pitches AS p on p.id = b.pitch_id INNER JOIN users as u ON u.id = b.user_id INNER JOIN offers AS o ON o.id = b.offer_id');
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
            $statement = $db->prepare("SELECT b.id AS SN, p.name AS Pitches, CONCAT(u.fname, ' ', u.lname) AS 'Client Name', b.booked_time AS 'Booked time', o.name AS 'Offer'  FROM booking AS b INNER JOIN pitches AS p on p.id = b.pitch_id INNER JOIN users as u ON u.id = b.user_id INNER JOIN offers AS o ON o.id = b.offer_id WHERE b.user_id =:user_id");
            $statement->execute([':user_id' => $user_id]);
            return $statement->fetchAll();


        }


    }
?>