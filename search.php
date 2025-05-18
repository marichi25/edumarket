<?php
require 'includes/db.php';

$term = $_GET['q'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM materials WHERE title LIKE ?");
$stmt->execute(["%$term%"]);
$results = $stmt->fetchAll();

foreach ($results as $mat): ?>
    <div class="col">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
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
