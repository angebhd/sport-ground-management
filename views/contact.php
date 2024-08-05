<?php
    echo '<div id = "contact">';
    echo '<h1> Contact page</h1>'
?>
    <h2> Get in touch</h2>
    <form action="" method="post">
        <div>
            <label for="fname">Full name: </label>
            <input type="text" name="fname" id="" placeholder="Your name">
        </div>

        <div>
            <label for="email">Email: </label>
            <input type="email" name="email" id="" placeholder="you@mail.com">
        </div>
        <div>
            <label for="msg">Message: </label>
            <textarea name="msg" id="" placeholder="Your message..." rows = "5"></textarea>
        </div>
        <button type="submit">Send message</button>
    </form>
    <h2>Social media</h2>
    <section>
        <a href="mailto:info@uwanja.rw"><div>
            <img src="assets/socialmedia/mail.png" alt="mail">
            <p>info@uwanja.rw</p>
        </div></a>
        <a href="https://linkedin.com"><div>
            <img src="assets/socialmedia/linkedin.png" alt="linkedin">
            <p>Uwanja Sport ground</p>
        </div></a>
        <a href="https://x.com"><div>
            <img src="assets/socialmedia/x.png" alt="x">
            <p>@uwanjaground</p>
        </div></a>
    </section>

<?php
    echo '</div>';
?>