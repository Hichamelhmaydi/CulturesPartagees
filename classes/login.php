<?php
require_once '../database/Connection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start(); 
}
class Login {
    private $email;
    private $password;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function setValues($email, $password) {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->password = $password;
    }

    public function login() {
 
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bindParam(1, $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($this->password, $user['user_password'])) {

            $_SESSION['user'] = [
                'id_user' => $user['id_user'],
                'nom' => $user['nom'],
                'prenom' => $user['prenom'],
                'email' => $user['email'],
                'role' => $user['role']
            ];
            

            header("Location: index.html");
            exit;
        } else {

            return "Adresse e-mail ou mot de passe incorrect.";
        }
    }
}
?>
