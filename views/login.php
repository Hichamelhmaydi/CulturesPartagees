<?php
session_start();

require_once '../database/Connection.php';
require_once '../classes/login.php';

$pdo = (new Connection())->getPDO();



 $login = new Login($pdo);

 if (isset($_POST['sub'])) {
     $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty($email) && !empty($password)) {
         $login->setValues($email, $password);        
        $login->login();  
    } 
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de connexion</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
  <section class="section">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-half">
          <h1 class="title has-text-centered">Connexion</h1>
          <form method="POST">
            <div class="field">
              <label class="label">Adresse email</label>
              <div class="control">
                <input class="input" type="email" name="email" placeholder="Entrez votre email" required>
              </div>
            </div>

            <div class="field">
              <label class="label">Mot de passe</label>
              <div class="control">
                <input class="input" type="password" name="password" placeholder="Entrez votre mot de passe" required>
              </div>
            </div>

            <div class="field">
              <div class="control">
                <button name="sub" class="button is-primary is-fullwidth">Se connecter</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
