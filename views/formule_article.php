<?php
require_once '../database/connection.php';
require_once '../classes/add_article.php';

$pdo = (new Connection())->getPDO();

if (isset($_POST['sub_art'])) {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $auteur = $_POST['auteur'];
    $categorie = $_POST['categorie'];

    echo "Titre: " . $titre . "<br>";
    echo "Contenu: " . $contenu . "<br>";
    echo "Auteur: " . $auteur . "<br>";
    echo "Categorie: " . $categorie . "<br>";

    if (!empty($titre) && !empty($contenu) && !empty($auteur) && !empty($categorie)) {
        $Article = new Article($pdo);
        $Article->setValues($titre, $contenu, $auteur, $categorie);
        $Article->ajouterArticle();
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>Formulaire de l'article</title>
</head>
<body>
    <!-- Formulaire pour ajouter un article -->
    <form method="POST" action="">
        <section class="section">
            <div class="container">
                <h1 class="title has-text-centered">Ajouter un article</h1>
                <div class="columns is-centered">
                    <div class="column is-half">
                        <div class="field">
                            <label class="label">Titre</label>
                            <div class="control">
                                <input class="input" type="text" name="titre" placeholder="Entrez le titre de l'article" maxlength="100" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Contenu</label>
                            <div class="control">
                                <textarea class="textarea" name="contenu" placeholder="Écrivez le contenu de l'article" maxlength="1000" required></textarea>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Auteur</label>
                            <div class="control">
                                <input class="input" type="text" name="auteur" placeholder="Entrez le nom de l'auteur" maxlength="50" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Catégorie</label>
                            <div class="control">
                                <input class="input" type="text" name="categorie" placeholder="Entrez la catégorie de l'article" maxlength="50" required>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button class="button is-primary is-fullwidth" type="submit" name="sub_art">Ajouter l'article</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>
</html>
