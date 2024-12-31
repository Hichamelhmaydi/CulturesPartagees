<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire d'inscription</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
  <section class="section">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-half">
          <h1 class="title has-text-centered">Inscription</h1>
          <form method="post">
            <div class="field">
              <label class="label">Nom</label>
              <div class="control">
                <input class="input" type="text" name="nom" placeholder="Entrez votre nom" required>
              </div>
            </div>

            <div class="field">
              <label class="label">prenom</label>
              <div class="control">
                <input class="input" type="text" name="prenom" placeholder="Entrez votre prenom" required>
              </div>
            </div>

            <div class="field">
              <label class="label">Adresse email</label>
              <div class="control">
                <input class="input" type="email" name="email" placeholder="Entrez votre email" required>
              </div>
            </div>

            <div class="field">
              <label class="label">Mot de passe</label>
              <div class="control">
                <input class="input" type="password" name="mot_de_passe" placeholder="Choisissez un mot de passe" required>
              </div>
            </div>

            <div class="field">
                <label>Rôle
                    <select class="input-group-field" name="role" style="padding: 10px; font-size: 1rem; border: 1px solid #ccc; border-radius: 5px;" required>
                            <option value="" disabled selected>Sélectionnez votre rôle</option>
                            <option value="utilisateur">Utilisateur</option>
                            <option value="auteur">Auteur</option>
                    </select>
                </label>
            </div>
            <div class="field">
              <div class="control">
                <label class="checkbox">
                  <input type="checkbox" name="conditions" required>
                  J'accepte les <a href="#">termes et conditions</a>
                </label>
              </div>
            </div>

            <div class="field">
              <div class="control">
                <button class="button is-primary is-fullwidth">S'inscrire</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
