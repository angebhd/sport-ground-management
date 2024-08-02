<?php 

    class Pitches{

        public static function getAll(){
            require_once ("DBconnection.php");
            $db = new DBconnection();
            $db = $db->getConnection();
            $statement = $db->prepare("SELECT * FROM pitches");
            $statement->execute();
            return $statement->fetchAll();
        }

    }
?>