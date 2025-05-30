<?php
require_once 'database.php'; // contient la classe connexion
session_start(); // NÉCESSAIRE pour utiliser $_SESSION

$connexion = new connexion();
$pdo = $connexion->CNXbase();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo"><img src="assets/Images/Colone PNG.png" alt="" id="logo"></div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="icons">
                <span><img src="assets/Images/chercher.png" alt="" id="recherche"></span>
                <span><img src="assets/Images/la-personne.png" alt="" id="la-personne"></span>
                <span><img src="assets/Images/coeur.png" alt=""></span>
                <span><a href="add_to_cart.php"></a><img src="assets/Images/sac-de-courses.png" alt=""></span>
            </div>
        </nav>
    </header>

    <!-- Our Products Section -->
    <section class="our-products">
        <h2>Our Products</h2>
        <section class="filters">
            <div class="filter-options">
                <select id="category-filter">
                    <option value="all">Toutes les catégories</option>
                    <option value="furniture">Furniture</option>
                    <option value="lighting">Lighting</option>
                    <option value="kitchen">Kitchen</option>
                    <option value="decor">Decor</option>
                </select>
                <select id="sort-by">
                    <option value="default">Trier par</option>
                    <option value="price-low">Prix (Croissant)</option>
                    <option value="price-high">Prix (Décroissant)</option>
                </select>
            </div>
        </section>

        <div class="products">
            <?php
            if ($pdo) {
                $stmt = $pdo->query("SELECT * FROM products");
                while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="product" data-category="' . htmlspecialchars($product['category']) . '" data-popularity="1">';
                    echo '    <img src="' . htmlspecialchars($product['image']) . '" alt="' . htmlspecialchars($product['name']) . '">';
                    echo '    <h3>' . htmlspecialchars($product['name']) . '</h3>';
                    echo '    <p>' . htmlspecialchars($product['description']) . '</p>';
                    echo '    <p class="price">' . htmlspecialchars($product['price']) . ' DT</p>';
                    echo '    <form method="POST" action="add_to_cart.php">';
                    echo '        <input type="hidden" name="product_id" value="' . $product['id'] . '">';
                    echo '        <button type="submit" class="add-to-cart">Add to cart</button>';
                    echo '    </form>';
                    echo '</div>';
                }
            } else {
                echo "<p>Erreur de connexion à la base de données.</p>";
            }
            ?>
        </div>
    </section>

    <script src="assets/js/script.js"></script>

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
</body>
</html>
