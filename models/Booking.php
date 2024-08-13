<?php 

    class Booking{

        public static function getAll(){
            require_once ("DBconnection.php");
            $db = new DBconnection();
            $db = $db->getConnection();
            $statement = $db->prepare('SELECT b.id AS SN, p.name AS Pitches, CONCAT(u.fname, " ", u.lname) AS "Client Name", b.booked_time AS "Booked time", b.duration AS "Duration",o.duration AS "Duration_unit" , o.name AS "Offer"  FROM booking AS b INNER JOIN pitches AS p on p.id = b.pitch_id INNER JOIN users as u ON u.id = b.user_id INNER JOIN offers AS o ON o.id = b.offer_id ORDER BY SN ASC');
            $statement->execute();
            return $statement->fetchAll();
        }

        public static function create($pitch, $user, $booked_time, $duration,  $offer){
            require_once ("DBconnection.php");
            $db = new DBconnection();
            $db = $db->getConnection();

            $statement = $db->prepare("INSERT INTO booking (pitch_id, user_id, booked_time, duration, offer_id) VALUES (:pitch, :user, :booked_time, :duration, :offer)");
            $statement->bindParam(':pitch', $pitch);
            $statement->bindParam(':user', $user);
            $statement->bindParam(':booked_time', $booked_time);
            $statement->bindParam(':duration', $duration);
            $statement->bindParam(':offer', $offer);
            $statement->execute();
        }
        public function userBooking($user_id){

            require_once ("DBconnection.php");
            $db = new DBconnection();
            $db = $db->getConnection();
            $statement = $db->prepare('SELECT b.id AS SN, p.name AS Pitches, CONCAT(u.fname, " ", u.lname) AS "Client Name", b.booked_time AS "Booked time", b.duration AS "Duration",o.duration AS "Duration_unit" , o.name AS "Offer"  FROM booking AS b INNER JOIN pitches AS p on p.id = b.pitch_id INNER JOIN users as u ON u.id = b.user_id INNER JOIN offers AS o ON o.id = b.offer_id; WHERE b.user_id =:user_id ORDER BY b.id ASC');
            $statement->execute([':user_id' => $user_id]);
            return $statement->fetchAll();
        }
        public function oneBooking($id){
            require_once ("DBconnection.php");
            $db = new DBconnection();
            $db = $db->getConnection();
            $statement = $db->prepare("SELECT * FROM booking WHERE id =:id");
            $statement->execute([':id' => $id]);
            return $statement->fetch();
        }
        public function getOneBooking($id){
            require_once ("DBconnection.php");
            $db = new DBconnection();
            $db = $db->getConnection();
            $statement = $db->prepare('SELECT b.id AS SN, p.name AS Pitches, CONCAT(u.fname, " ", u.lname) AS "Client Name", b.booked_time AS "Booked time", b.duration AS "Duration",o.duration AS "Duration_unit" , o.name AS "Offer"  FROM booking AS b INNER JOIN pitches AS p on p.id = b.pitch_id INNER JOIN users as u ON u.id = b.user_id INNER JOIN offers AS o ON o.id = b.offer_id; WHERE b.id =:booking_id ORDER BY b.id ASC');
            $statement->execute([':booking_id' => $id]);
            return $statement->fetch();

        }

        public function updateOneBooking($booked_time, $duration, $pitch, $offer, $id){
            require_once ("DBconnection.php");
            $db = new DBconnection();
            $db = $db->getConnection();
            $statement = $db->prepare("UPDATE booking SET pitch_id=:pitch, booked_time=:booked_time, duration=:duration, offer_id=:offer WHERE id =:id");
            $statement->bindParam(':booked_time', $booked_time);
            $statement->bindParam(':duration', $duration);
            $statement->bindParam(':pitch', $pitch);
            $statement->bindParam(':offer', $offer);
            $statement->bindParam(':id', $id);
            $statement->execute();
            return true;
        }
        public function deleteOne ($id){
            require_once ("DBconnection.php");
            $db = new DBconnection();
            $db = $db->getConnection();
            $statement = $db->prepare("DELETE from booking WHERE id =:id");
            $statement->bindParam(':id', $id);
            $statement->execute();
            return true;
        }
    }
?>