<?php
session_start();
require 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';
    $user_id = $_SESSION['user_id'];

    $image_path = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = basename($_FILES['image']['name']);
        $image_path = 'uploads/' . time() . '_img_' . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    }

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $filename = basename($_FILES['file']['name']);
        $target_path = 'uploads/' . time() . '_' . $filename;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
            $stmt = $pdo->prepare("INSERT INTO materials (title, description, price, file_path, image_path, user_id) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $description, $price, $target_path, $image_path, $user_id]);

            $message = "Skripta uspešno dodata!";
        } else {
            $message = "Greška pri uploadu fajla.";
        }
    } else {
        $message = "Fajl nije odabran ili je došlo do greške.";
    }
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Dodaj skriptu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .upload-box {
            max-width: 600px;
            margin: 80px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="upload-box">
    <h3 class="mb-3">Dodaj novu skriptu</h3>

    <?php if (!empty($message)): ?>
        <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Naslov</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Opis</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Cena (€)</label>
            <input type="number" name="price" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">PDF fajl</label>
            <input type="file" name="file" class="form-control" accept=".pdf" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Dodaj sliku (opciono)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success w-100">Dodaj skriptu</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
