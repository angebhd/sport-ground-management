<?php 
    class UserController {

        public function signin(){
            $methodReq = $_SERVER['REQUEST_METHOD'];
            if ($methodReq == 'POST'){
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $c_password = $_POST['c_password'];
                if ($password == $c_password){
                    require_once ("models/User.php");
                    User::create($fname, $lname, $username, $email, $password);
                    return true;
                } else{
                    return false;
                        
                } 
            }
        }
    }

?>