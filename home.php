
<?php
session_start();
require 'includes/db.php'; 
include 'includes/header.php'; 
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8"> 
    <title>Dobrodošli na EduMarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero {
            max-width: 700px;
            margin: 80px auto;
            padding: 40px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            text-align: center;
        }
    </style>
</head>
<body>

<div class="hero">
    <h1 class="mb-4">Dobrodošli na <strong>EduMarket</strong></h1>
    <p>Najveći i najbolji online market za skripte, udžbenike i ostale edukativne materijale.</p>
    <p>Pronađite ili podelite znanje. Besplatno ili uz simboličnu nadoknadu.</p>
    <a href="index.php" class="btn btn-primary mt-4">Pogledaj skripte</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>