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

        public function login (){
            $methodReq = $_SERVER['REQUEST_METHOD'];
            if ($methodReq == 'POST'){
                $username = $_POST['username'];
                $password = $_POST['password'];
                require_once('models/User.php');
                $user = User::getUserByUsername($username);
                if ($user){
                    echo $user['password'];
                    echo $password;
                    if ($password == $user['password']){
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['user_name'] = $user['fname']. ' ' . $user['lname'];
                        $_SESSION['username'] = $user['username'];
                        return true;
                    }else{
                        return false;
                    }

                }else{
                    return false;
                }
            }
        }
        public function logout(){
            session_start();
            session_unset();
            session_destroy();
        }
    }

?>