<?php
require_once 'models/Material.php';

class IndexController {
    public function show() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit;
        }

        $materials = Material::all();
        include 'views/index.view.php';
    }
}
?>