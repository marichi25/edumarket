<?php
require_once 'includes/db.php';

class Material {
    public static function all() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM materials ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    public static function create($title, $description, $price, $file_path, $image_path, $user_id) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO materials (title, description, price, file_path, image_path, user_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $description, $price, $file_path, $image_path, $user_id]);
    }

    public static function searchByTitle($term) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM materials WHERE title LIKE ?");
    $stmt->execute(["%$term%"]);
    return $stmt->fetchAll();
}

}
