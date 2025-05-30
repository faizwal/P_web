<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    

    <header>
        <nav class="navbar">
            <div class="logo"><img src="assets/Images/Colone PNG.png" alt="" id="logo"></div>
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="icons">
                <span><img src="assets/Images/chercher.png" alt="" id="recherche"></span>
                <span><img src="assets/Images/la-personne.png" alt="" id="la-personne"></span>
                <span><img src="assets/Images/coeur.png" alt=""></span>
                <span><img src="assets/Images/sac-de-courses.png" alt=""></span>
            </div>
        </nav>
    </header>

     <!-- Contact Section -->
     <section class="contact">
        <div class="contact-container">
            <form class="contact-form">
                <h2>Contact us</h2>
                <p>Fill out this form and we will respond quickly</p>
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="subject">Subjec</label>
                    <select id="subject" name="subject">
                        <option value="">Select a topic</option>
                        <option value="question">Question</option>
                        <option value="support">Support</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                
                <button type="submit" class="submit-btn">Send message</button>
            </form>
            
            <div class="contact-info">
                <h3>Our contact details</h3>
                <p><strong>Email:</strong> vayouza@gmail.com</p>
                <p><strong>Phone nummber:</strong> +216 26 185 743</p>
                <p><strong>Adresse:</strong> Tunis, SFAX</p>
                <p><strong>Time:</strong> Lun-Ven: 9h-18h</p>
            </div>
        </div>
    </section>


    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2025 My Website | All rights reserved</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/faiz.walha.1"><img src="assets/Images/facebook (1).png" alt=""><i
                        class="fab fa-facebook"></i></a>
                <a href="#"><img src="assets/Images/tic-tac.png" alt=""><i class="fab fa-tiktok"></i></a>
                <a href="#"><img src="assets/Images/instagram (1).png" alt=""><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>