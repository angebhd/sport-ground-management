<?php 

    class User{

        public static function create($fname, $lname, $username, $email, $password){
            require_once ("DBconnection.php");
            $role = 1;
            $db = new DBconnection();
            $db = $db->getConnection();
            $statement = $db->prepare("INSERT INTO users (fname, lname, username, email, password, role) VALUES (:fname, :lname, :username, :email, :password, :role)");
            $statement->bindParam(':fname', $fname);
            $statement->bindParam(':lname', $lname);
            $statement->bindParam(':username', $username);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':password', $password);
            $statement->bindParam(':role', $role);
            $statement->execute();
        }

        public static function getUserByUsername($username){
            require_once ("DBconnection.php");
            $db = new DBconnection();
            $db = $db->getConnection();
            $statement = $db->prepare("SELECT * FROM users WHERE username = :username");
            $statement->execute([':username' => $username]);
            return $statement->fetch();
        }

    }
?>