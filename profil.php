<?php
session_start();
require_once 'user.class.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user = new User(); // Notez le 'U' majuscule si votre classe s'appelle User
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name =($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = !empty($_POST['password']) ? $_POST['password'] : null;
    

    if ($user->updateProfile($_SESSION['user_id'], $name, $email, $password)) {
        $_SESSION['user_name'] = $name;
        $message = 'Profil mis à jour avec succès.';
    } else {
        $message = 'Erreur lors de la mise à jour.';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Reset et structure générale */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #F0F2F5;
            color: #333333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 5%;
            background: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        /* Contenu principal */
        main {
            flex: 1;
            padding: 100px 20px 60px; /* Espace pour header et footer */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrapper {
            background-color: #FFFFFF;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        /* Footer */
        .footer {
            background-color: #f8f8f8;
            color: black;
            text-align: center;
            padding: 20px 0;
            width: 100%;
            box-shadow: 0px -4px 10px rgba(0, 0, 0, 0.1);
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            padding: 15px 0;
        }

        .social-icons a img {
            width: 30px;
            height: 30px;
            transition: transform 0.3s ease;
        }

        .social-icons a:hover img {
            transform: scale(1.2);
        }

        /* Styles restants (conservés de votre code) */
        h2 {
            color: #2C3E50;
            margin-bottom: 30px;
            font-size: 2.2em;
            font-weight: 700;
        }

        .success {
            background-color: #D4EDDA;
            color: #155724;
            border: 1px solid #C3E6CB;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .error {
           
            color: #721C24;
            
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        form {
            text-align: left;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555555;
            font-size: 0.95em;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 10px;
            margin-bottom: 20px;
            border: 1px solid #CCCCCC;
            border-radius: 8px;
            font-size: 1em;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus {
            border-color: #DB4A2B;
            box-shadow: 0 0 0 3px rgba(219, 74, 43, 0.25);
            outline: none;
        }

        button[type="submit"] {
            background-color: #DB4A2B;
            color: white;
            padding: 14px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #C03C21;
            transform: translateY(-2px);
        }

        a {
            display: inline-block;
            margin-top: 25px;
            color: #DB4A2B;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #C03C21;
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .wrapper {
                padding: 25px;
            }
            
            h2 {
                font-size: 1.8em;
            }
        }
    </style>
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

    <main>
        <div class="wrapper">
            <h2>Profil de <?= htmlspecialchars($_SESSION['user_name'] ?? '') ?></h2>
            <?php if (isset($message)): ?>
                <p class="<?= strpos($message, 'succès') !== false ? 'success' : 'error' ?>">
                    <?= htmlspecialchars($message) ?>
                </p>
            <?php endif; ?>
            <form method="post">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($_SESSION['user_name'] ?? '') ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($_SESSION['user_email'] ?? '') ?>" required>

                <label for="password">Nouveau mot de passe (optionnel):</label>
                <input type="password" id="password" name="password" placeholder="Laisser vide pour ne pas changer">

                <button type="submit">Mettre à jour</button>
            </form>
            <a href="logout.php">Se déconnecter</a>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2025 My Website | All rights reserved</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/faiz.walha.1"><img src="assets/Images/facebook (1).png" alt="Facebook"></a>
                <a href="#"><img src="assets/Images/tic-tac.png" alt="TikTok"></a>
                <a href="#"><img src="assets/Images/instagram (1).png" alt="Instagram"></a>
            </div>
        </div>
    </footer>
</body>
</html>