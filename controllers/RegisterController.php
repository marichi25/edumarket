<?php
require_once 'models/User.php';

class RegisterController {
    public function register() {
        $poruka = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            User::create($username, $email, $password);

            $poruka = "Registracija uspešna! <a href='login.php'>Prijavi se</a>";
        }

        include 'views/register.view.php';
    }
}