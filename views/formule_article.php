<?php
require_once '../database/connection.php';
require_once '../classes/add_article.php';
session_start();

$pdo = (new Connection())->getPDO();

if (isset($_POST['sub_art'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $contenu = htmlspecialchars($_POST['contenu']);
    $auteur = htmlspecialchars($_POST['auteur']);
    $categorie = htmlspecialchars($_POST['categorie']);

    if (isset($_FILES['image']) ) {
        $image = $_FILES['image'];
        $image_tmp_name = $image['tmp_name'];
        $image_name = time() . '-' . basename($image['name']);
        $upload_dir = '../uploads/';
        $imagePath = $upload_dir . $image_name;

        if ($image['size'] > 1000000) {
            echo "la taille de l'image est trop grande.";
            exit;
        }

        if (move_uploaded_file($image_tmp_name, $imagePath)) {
            if (!empty($titre) && !empty($contenu) && !empty($auteur) && !empty($categorie)) {
                $_SESSION['titre'] = $titre;
                $_SESSION['contenu'] = $contenu;
                $_SESSION['auteur'] = $auteur;
                $_SESSION['image'] = $imagePath;

                $article = new Article($pdo);
                $article->setValues($titre, $contenu, $auteur, $categorie, $imagePath);
                $article->ajouterArticle();
            } else {
                echo "tout les champs sont obligatoires.";
            }
        } else {
            echo " error en upload.";
        }
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
    <form method="POST" action="" enctype="multipart/form-data">
        <section class="section">
            <div class="container">
                <h1 class="title has-text-centered">Ajouter un article</h1>
                <div class="columns is-centered">
                    <div class="column is-half">
                        <div class="field">
                            <label class="label">Titre</label>
                            <div class="control">
                                <input class="input" type="text" name="titre" placeholder="Entrez le titre de l'article" maxlength="20" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Contenu</label>
                            <div class="control">
                                <textarea class="textarea" name="contenu" placeholder="écrivez le contenu de l'article" maxlength="1000" required></textarea>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Auteur</label>
                            <div class="control">
                                <input class="input" type="text" name="auteur" placeholder="Entrez le nom de l'auteur" maxlength="20" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Catégorie</label>
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name="categorie" required>
                                        <option value="" disabled selected>Choisissez une catégorie</option>
                                        <option value="cinema">Cinéma</option>
                                        <option value="musique">Musique</option>
                                        <option value="sports">Sports</option>
                                        <option value="les arts">Les Arts</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Image</label>
                            <div class="control">
                                <input class="input" type="file" name="image" accept="image/*" required>
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