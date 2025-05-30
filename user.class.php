<?php

require_once 'database.php';

class user extends connexion
{
    public function register($name, $email, $password)
    {
        //verify if user already exist with his email
        $stmt = $this->CNXbase()->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user) {
            return "Email already exist !";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->CNXbase()->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $hashedPassword]);
            return true;
        }
    }

    public function connect($email, $password)
    {
        $stmt = $this->CNXbase()->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

}

?>