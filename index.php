<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<?php session_start(); ?>

<?php 
    // logic contolleurs
    $methodReq = $_SERVER['REQUEST_METHOD'];
    if ($methodReq == 'POST'){
        $page = isset($_GET['page'])?$_GET['page'] : 'home';
        switch ($page){
            case 'signup':
                require_once('controllers/User.php');
                $user = new UserController();
                $signin = $user->signin();
                if ($signin) {echo "<script>alert(\"User added\")</script>"; header("Location: /?page=login");}else{ echo "<script>alert(\"Password are not the same\")</script>";}
                break;
            case 'login':
                require_once('controllers/User.php');
                $user = new UserController();
                $login = $user->login();
                if($login){ header('Location: /');}else {  echo "<script>alert(\"Invalid cedentials\")</scri>";}
                break;

            default: 
                header('Location: /?page=home');
                break;
        } 
    }
?>

<?php 
//Handling the page to display
    $page = isset($_GET['page'])?$_GET['page'] : 'home';
    $includeHeader = true;
    if ($page == 'login' || $page == 'signup'){ $includeHeader = false; }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/<?php echo $page;?>.css">
    <?php if (!$includeHeader){?>
    <link rel="stylesheet" href="style/<?php echo'login';?>.css">
    <link rel="stylesheet" href="style/<?php echo'book';?>.css">
    <?php }?>


    <title><?php echo strtoupper($page);?> - Uwanja</title>
</head>
<body>
    <?php
        if ($includeHeader) { require_once("views/header.php");}
        switch ($page)
        {
            case 'home':
                require_once ("views/home.php");
                break;
            case 'pitches':
                require_once ("views/pitches.php");
                break;
            case 'book':
                require_once ("views/book.php");
                break;
            case 'about':
                require_once ("views/about.php");
                break;
            case 'login':
                require_once ("views/login.php");
                break;
            case 'logout':
                require_once('controllers/User.php');
                $user = new UserController();
                $user->logout();
                header("Location: /");
                break;
            case 'signup':
                require_once ("views/signup.php");
                break;
            default:
                http_response_code(404);
        }
    ?>
    <?php require_once ("views/footer.php"); ?>
</body>
</html>