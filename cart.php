<?php
session_start();

if (isset($_GET['remove'])) {
    $removeId = intval($_GET['remove']);
    unset($_SESSION['cart'][$removeId]);
}

if (isset($_GET['clear'])) {
    unset($_SESSION['cart']);
}

$cart = $_SESSION['cart'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Votre panier</title>
        <link rel="stylesheet" href="assets/css/cart.css">

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
                <span>
                    <a href="cart.php">
                        <img src="assets/Images/sac-de-courses.png" alt="">
                        
                    </a>
                </span>
            </div>
        </nav>
    </header>
    <h1>Votre panier</h1>

    <?php if (empty($cart)): ?>
        <h1>Votre panier est vide.</h1>
       <button onclick="window.location.href='shop.php'" class="add-to-cart">
    <-Retour à la boutique
</button>
    <?php else: ?>
        <?php $total = 0; ?>
        <?php foreach ($cart as $item): ?>
            <div class="product">
                <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>">
                <h3><?= $item['name'] ?></h3>
                <p>Quantité : <?= $item['quantity'] ?></p>
                <p>Prix unitaire : <?= number_format($item['price'], 2) ?> DT</p>
                <p>Sous-total : <?= number_format($item['price'] * $item['quantity'], 2) ?> DT</p>
                <div class="actions">
                   <button onclick="window.location.href='cart.php?remove=<?= $item['id'] ?>'" class="add-to-cart">
    Supprimer
</button>

                </div>
            </div>
            <?php $total += $item['price'] * $item['quantity']; ?>
        <?php endforeach; ?>

        <h2>Total : <?= number_format($total, 2) ?> DT</h2>
        <div class="actions">
           <button onclick="window.location.href='cart.php?clear=1'" class="add-to-cart">
     Vider le panier
</button><button onclick="window.location.href='shop.php'" class="add-to-cart">
     Continuer vos achats
</button>
        </div>
    <?php endif; ?>
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
