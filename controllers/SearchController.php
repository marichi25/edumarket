<?php
require_once 'models/Material.php';

class SearchController {
    public function search() {
        $term = $_GET['q'] ?? '';
        $results = Material::searchByTitle($term);

        // Uključi View koji prikazuje samo rezultate (HTML kartice)
        include 'views/search.view.php';
    }
}