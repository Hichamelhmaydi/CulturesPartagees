<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>formule de article</title>
</head>
<body>
     <!-- article form -->
     <form action="" id="article_form">

<section class="section">
            <div class="container">
            <h1 class="title has-text-centered">Ajouter un article</h1>
            <div class="columns is-centered">
                <div class="column is-half">
                <form method="POST" action="add_article.php">
                    <div class="field">
                    <label class="label">Titre</label>
                    <div class="control">
                        <input class="input" type="text" name="titre" placeholder="Entrez le titre de l'article" maxlength="20" required >
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
                        <input class="input" type="text" name="auteur" placeholder="Entrez le nom de l'auteur" maxlength="20" required>
                    </div>
                    </div>

                    <div class="field">
                    <label class="label">Catégorie</label>
                    <div class="control">
                        <input class="input" type="text" name="categorie" placeholder="Entrez la catégorie de l'article" maxlength="10" required>
                    </div>
                    </div>

                    <div class="field">
                    <div class="control">
                        <button class="button is-primary is-fullwidth" type="submit" name="sub_art">Ajouter l'article</button>
                    </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
    </section>

</form>
<!-- fin article form -->
</body>
</html>