<?php foreach ($results as $mat): ?>
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