<?php
session_start();
require_once 'user.class.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $user = new user();
    $user = $user->connect($email, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header('Location: home.php');
        exit;
    } else {
        $_SESSION['login_error'] = "Email or Password incorrect.";
        header('Location: login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style2.css">
</head>

<body>
    <div class="wrapper">
        <img src="assets/images/home_img.png" alt="">
        <h2 class="text-right">Welcome</h2>
        <div class="form-wrapper login">
            <form action="login.php" method="post">
                <h2>Login</h2>
                <?php if (isset($_SESSION['login_error'])): ?>
                    <div class="error-msg"><?= $_SESSION['login_error'];
                    unset($_SESSION['login_error']); ?></div>
                <?php endif; ?>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit">Login</button>
                <div class="sign-link">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>