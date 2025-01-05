<?php
require_once '../database/Connection.php';
require_once '../classes/modification_categorie.php';

$pdo = new PDO('mysql:host=localhost;dbname=culturespartagees', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$categorie = new Categorie($pdo);

?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> gestion des catégorie</title>
</head>
<body>
    <?php $categorie->render(); ?>
</body>
</html>
