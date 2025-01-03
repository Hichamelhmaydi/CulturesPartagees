<?php
require_once '../database/Connection.php';
require_once '../classes/add_categorie.php';

$pdo = (new Connection())->getPDO();

$addCategorie = new AddCategorie($pdo);

if (isset($_POST['submit'])) {
    $nom_ca = $_POST['category_name'];
    if (!empty($nom_ca)) {
        $addCategorie->setValeus($nom_ca);  
        $addCategorie->AddCategorie();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Catégorie</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/vendor.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <header class="short-header">
        <div class="row header-content">
            <div class="logo">
                <a href="admin_dashboard.html">Dashboard Administrateur</a>
            </div>
        </div>
    </header>

    <section class="section">
        <div class="row">
            <div class="col-twelve">
                <h2>Ajouter une Nouvelle Catégorie</h2>
                <form action="add_category.php" method="POST">
                    <label for="category_name">Nom de la Catégorie :</label>
                    <input type="text" id="category_name" name="category_name" placeholder="Entrez le nom de la catégorie" required>
                    <button type="submit" name="submit" class="button-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
