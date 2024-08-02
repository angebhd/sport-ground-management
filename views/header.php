<header> 
<div class="logo"><img src="/assets/img/logo.png" alt="logo"> <p> <?php echo "UWANJA SPORT GROUND"?></p></div>
<nav>
    <p><a href="/">HOME</a></p>
    <p><a href="/?page=pitches">OUR PITCHES</a></p>
    <p><a href="/?page=book">BOOK A PITCH</a></p>
    <p><a href="/?page=contact">CONTACT</a></p>
    <p><a href="/?page=about">ABOUT US</a></p>
</nav>
<div class="dashboard">
    <p>Dashbord:<?php if (isset($_SESSION['username'])){ echo "<a href='/?pages=dashbord'>";echo $_SESSION['username']; echo "</a>"; }else {echo 'user';}  ?></p>
    <?php 
        if (isset($_SESSION['username'])){
            echo "<p><a class=\"red\" href=\"/?page=logout\">Logout</a></p>";
        }else{
            echo "<p><a href=\"/?page=login\">Login</a></p>";
        }
    ?>
    
</div>
</header>