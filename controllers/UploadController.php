<?php
require_once 'models/Material.php';
session_start();

class UploadController {
    public function handleUpload() {
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
                    Material::create($title, $description, $price, $target_path, $image_path, $user_id);
                    $message = "Skripta uspešno dodata!";
                } else {
                    $message = "Greška pri uploadu fajla.";
                }
            } else {
                $message = "Fajl nije odabran ili je došlo do greške.";
            }
        }

        include 'views/upload.view.php';
    }
}