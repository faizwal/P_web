<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vayouza</title>
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

    <section class="hero">
        <img src="assets/Images/backround.jpg" alt="">

        <div class="hero-content">
            <h5>New Arrival</h5>
            <h1>Discover Our New Collection</h1>
            <p>Discover our new decoration collection, where elegance and originality come together to enhance your
                interior.
            </p>
            <a href="shop.php"><button style="padding: 10px;" class="add-to-cart">BUY NOW</button></a>
        </div>
    </section>

    <!-- Browse The Range Section -->
    <section class="browse-range">
        <h2>Browse The Range</h2>
        <p>Explore our diverse range of decorative pieces designed to bring style and personality to your space. From
            elegant home accessories to statement decor items, our collection offers something for every taste and
            interior. </p>
        <div class="categories">
            <div class="category">
                <img src="assets/Images/dining2.jpg" alt="Dining" id="dining">
                <p>Dining</p>
            </div>
            <div class="category">
                <img src="assets/Images/living.jpg" alt="Living">
                <p>Living</p>
            </div>
            <div class="category">
                <img src="assets/Images/bedroom.jpg" alt="Bedroom">
                <p>Bedroom</p>
            </div>
        </div>
    </section>

    <!-- Our Products Section -->
    <section class="our-products">
        <h2>Our Popular  Products</h2>
        <div class="products">
            <div class="product"><img src="assets/Images/cafe_chair.jpg" alt="Syltherine">
                <h3>Syltherine</h3>
                <p>Stylish cafe chair</p>
                <p class="price">250 DT</p>
            </div>
            <div class="product"><img src="assets/Images/night_lamp.jpg" alt="Grifo">
                <h3>Grifo</h3>
                <p>Night lamp</p>
                <p class="price"> 150 DT</p>
            </div>
            <div class="product"><img src="assets/Images/mug.jpg" alt="Muggo">
                <h3>Muggo</h3>
                <p>Small mug</p>
                <p class="price"> 30 DT</p>
            </div>
           
        </div>
        <a href="shop.php"> <button style="padding: 10px; margin-top: 10px;" class="add-to-cart">Show More</button></a>
    </section>


   <footer class="footer">
    <div class="footer-content">
        <p>&copy; 2025 My Website | All rights reserved</p>
        <div class="social-icons">
            <a href="https://www.facebook.com/faiz.walha.1"><img src="assets/Images/facebook (1).png" alt=""></a>
            <a href="#"><img src="assets/Images/tic-tac.png" alt=""></a>
            <a href="#"><img src="assets/Images/instagram (1).png" alt=""></a>
        </div>
    </div>
</footer>

<style>
    /* Style spécifique pour les icônes sociales du footer */
    .footer .social-icons a img {
        width: 30px;       /* Largeur des icônes */
        height: 30px;      /* Hauteur des icônes */
        margin: 0 10px;    /* Espacement entre les icônes */
        transition: transform 0.3s ease; /* Animation au survol */
    }
    
    .footer .social-icons a:hover img {
        transform: scale(1.2); /* Effet d'agrandissement au survol */
    }
    
    .footer .social-icons {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px 0;
    }
    
    .footer-content {
        text-align: center;
        padding: 20px 0;
    }
</style>
</body>

</html>