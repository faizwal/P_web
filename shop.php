<?php require 'filtre.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
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
    <span><a href="profil.php"><img src="assets/Images/la-personne.png" alt="" id="la-personne"></a></span>
    <span><img src="assets/Images/coeur.png" alt=""></span>
    <span><a href="cart.php"><img src="assets/Images/sac-de-courses.png" alt=""></a></span>
</div>
    </nav>
</header>

<section class="our-products">
    <h2>Our Products</h2>

    <!-- Filtres -->
    <section class="filters">
        <form method="GET" class="filter-options">
            <select name="category" onchange="this.form.submit()">
                <option value="all" <?= $category === 'all' ? 'selected' : '' ?>>Toutes les catégories</option>
                <option value="furniture" <?= $category === 'furniture' ? 'selected' : '' ?>>Furniture</option>
                <option value="lighting" <?= $category === 'lighting' ? 'selected' : '' ?>>Lighting</option>
                <option value="kitchen" <?= $category === 'kitchen' ? 'selected' : '' ?>>Kitchen</option>
                <option value="decor" <?= $category === 'decor' ? 'selected' : '' ?>>Decor</option>
            </select>

            <select name="sort" onchange="this.form.submit()">
                <option value="default" <?= $sort === 'default' ? 'selected' : '' ?>>Trier par</option>
                <option value="price-low" <?= $sort === 'price-low' ? 'selected' : '' ?>>Prix (Croissant)</option>
                <option value="price-high" <?= $sort === 'price-high' ? 'selected' : '' ?>>Prix (Décroissant)</option>
            </select>
        </form>
        <p><?= $total_products ?> produits trouvés</p>
    </section>

    <!-- Affichage des produits -->
<div class="products">
    <?php if (isset($error)): ?>
        <p>Erreur : <?= $error ?></p>
    <?php elseif ($products): ?>
        <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                <h3><?= $product['name'] ?></h3>
                <p><?= $product['description'] ?></p>
                <p class="price"><?= $product['price'] ?> DT</p>
                <form method="POST" action="add_to_cart.php">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <button type="submit" class="add-to-cart">Add to cart</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun produit trouvé.</p>
    <?php endif; ?>
</div>

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
