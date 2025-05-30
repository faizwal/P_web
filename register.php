<?php
session_start();
require_once 'user.class.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $user = new user();
    $result = $user->register($name, $email, $password);

    if ($result === true) {
        $_SESSION['register_message'] = 'success';
        header('Location: register.php');
    } else {
        $_SESSION['register_message'] = $result;
        header('Location: register.php');
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/style2.css">
</head>

<body>
    <div class="wrapper active">
        <img src="assets/images/home_img.png" alt="">
        <h2 class="text-right">Welcome</h2>
        <div class="form-wrapper register">
            <form action="register.php" method="post">
                <h2>Registration</h2>
                <?php if (isset($_SESSION['register_message'])): ?>
                    <?php if ($_SESSION['register_message'] === 'success'): ?>
                        <div class="success-msg">Register Successfully</div>
                    <?php else: ?>
                        <div class="error-msg"><?= htmlspecialchars($_SESSION['register_message']) ?></div>
                    <?php endif; ?>
                    <?php unset($_SESSION['register_message']); ?>
                <?php endif; ?>
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" name="name" placeholder="Full Name" required>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit">Register</button>
                <div class="sign-link">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>