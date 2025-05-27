<?php
require_once 'models/User.php';

class LoginController {
    public function login() {
        session_start();
        $error = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = User::findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header("Location: home.php");
                exit;
            } else {
                $error = "Pogrešan email ili lozinka.";
            }
        }

        include 'views/login.view.php';
    }
}