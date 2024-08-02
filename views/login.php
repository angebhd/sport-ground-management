
    <header>
    <div class="logo"><img src="/assets/img/logo.png" alt="logo"> <p> <?php echo "UWANJA SPORT GROUND"?></p></div>
    </header>


    <div id="book">
        <h1> Login </h1>
        <form action="/?page=login" method="post" >
    
            <div>
                <label for="username"> Username :</label>
                <input type="text" name="username" placeholder="angebhd" required>
            </div>
            <div>
                <label for="password"> Password :</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            

            <button type="submit" class="submit">Login</button>
            
        </form>
    </div>
    <br>
    <br>
    <br>

    <?php require_once("views/footer.php")?>
