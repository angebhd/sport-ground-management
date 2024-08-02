
<body>
    <header>
    <div class="logo"><img src="/assets/img/logo.png" alt="logo"> <p> <?php echo "UWANJA SPORT GROUND"?></p></div>
    </header>


    <div id="book">
        <h1> Signup </h1>
        <form action="/?page=signup" method="post" >
            <div>
                <label for="fname"> First name :</label>
                <input type="text" name="fname" placeholder="Ange">
            </div>

            <div>
                <label for="lname"> Last name :</label>
                <input type="test" name="lname" placeholder="Buhendwa">
            </div>
            <div>
                <label for="username"> Username :</label>
                <input type="text" name="username" placeholder="angebhd" required>
            </div>
            <div>
                <label for="email"> E-mail :</label>
                <input type="email" name="email" placeholder="angebhd@gmail.com" required>
            </div>
            <div>
                <label for="password"> Password :</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div>
                <label for="c-password"> Password :</label>
                <input type="password" name="c_password" placeholder="Confirm password" required>
            </div>

            <button type="submit" class="submit">Signup</button>
            
        </form>
    </div>

    <?php require_once("views/footer.php")?>
</body>
</html>