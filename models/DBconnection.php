<?php

    class DBconnection {
        public static function getConnection (){
            $host = "localhost";
            $dbname = "uwanja";
            $username = "DBuser";
            $password = "DBpass@123";

            return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        }

    }
?>