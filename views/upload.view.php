<?php include 'includes/header.php'; ?>
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