<?php
// sign_up.php
require_once '../database/Connection.php';
require_once '../classes/inscription.php';

$pdo = (new Connection())->getPDO();
$inscription = new Inscription($pdo);

if (isset($_POST['sub'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $user_password = $_POST['password'];
    $role = htmlspecialchars($_POST['role']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($user_password)&& !empty($nom)&& !empty($prenom)&& !empty($email)) {
        $inscription->setValues($nom, $prenom, $email, $user_password, $role);
        $inscription->inscription();
    } else {
        echo "Veuillez entrer des données valides.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire d'inscription</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
  <nav>
  <section class="section is-flex is-justify-content-center is-align-items-center" >
    <a href="login.php" class="button is-primary is-large is-rounded">Login</a>
  </section>
  </nav>
  <section class="section">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-half">
          <h1 class="title has-text-centered">Inscription</h1>
          <form method="POST">
            <div class="field">
              <label class="label">Nom</label>
              <div class="control">
                <input class="input" type="text" name="nom" placeholder="Entrez votre nom" required>
              </div>
            </div>

            <div class="field">
              <label class="label">Prénom</label>
              <div class="control">
                <input class="input" type="text" name="prenom" placeholder="Entrez votre prénom" required>
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
                <input class="input" type="password" name="password" placeholder="Choisissez un mot de passe" required>
              </div>
            </div>

            <div class="field">
              <label class="label">Rôle</label>
              <div class="control">
                <select class="input" name="role" required>
                  <option value="" disabled selected>Sélectionnez votre rôle</option>
                  <option value="utilisateur">Utilisateur</option>
                  <option value="auteur">Auteur</option>
                </select>
              </div>
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
                <button name="sub" class="button is-primary is-fullwidth">S'inscrire</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>
</html>


