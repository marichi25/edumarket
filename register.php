<?php
require 'includes/db.php';

$poruka = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $password]);

    $poruka = "Registracija uspešna! <a href='login.php'>Prijavi se</a>";
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
        }
        .register-box {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
    </style>
</head>
<body>

<div class="register-box">
    <h3 class="mb-3">Registracija</h3>

    <?php if (!empty($poruka)): ?>
        <div class="alert alert-success"><?= $poruka ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label>Korisničko ime</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Lozinka</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Registruj se</button>
    </form>

    <p class="mt-3">Već imaš nalog? <a href="login.php">Prijavi se</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

