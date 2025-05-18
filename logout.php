<?php
session_start();
session_destroy();
header("Refresh: 2; URL=login.php");
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Odjava</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
        }
        .logout-box {
            max-width: 400px;
            margin: 120px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="logout-box">
    <h4>Uspešno ste se odjavili.</h4>
    <p>Preusmeravamo vas na prijavu...</p>
</div>

</body>
</html>