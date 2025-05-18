<?php
session_start();
require 'includes/db.php';
include 'includes/header.php';



if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM materials ORDER BY created_at DESC");
$materials = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>EduMarket</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>



<div class="container mt-5">
    <h2 class="mb-4 text-center">EduMarket</h2>
    <div class="mb-4">
    <input type="text" id="search" class="form-control" placeholder="Pretraži skripte po naslovu...">
</div>

<div id="results">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($materials as $mat): ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
    <?php if (!empty($mat['image_path'])): ?>
        <img src="<?= htmlspecialchars($mat['image_path']) ?>" class="img-fluid mb-2" style="max-height: 200px; object-fit: cover; width: 100%;">
    <?php endif; ?>
    <h5 class="card-title"><?= htmlspecialchars($mat['title']) ?></h5>
    <p class="card-text"><?= nl2br(htmlspecialchars($mat['description'])) ?></p>
</div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <span><strong>Cena:</strong> <?= $mat['price'] ?> €</span>
                        <a href="<?= htmlspecialchars($mat['file_path']) ?>" target="_blank" class="btn btn-sm btn-primary">Otvori</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
const searchInput = document.getElementById('search');
const resultsDiv = document.getElementById('results');

searchInput.addEventListener('keyup', function () {
    const query = this.value;

    fetch('search.php?q=' + encodeURIComponent(query))
        .then(response => response.text())
        .then(html => {
            resultsDiv.innerHTML = '<div class="row row-cols-1 row-cols-md-3 g-4">' + html + '</div>';
        });
});
</script>
</body>
</html>

