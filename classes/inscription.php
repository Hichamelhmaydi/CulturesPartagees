<?php
require_once '../database/connection.php';
class Inscription {
    private $id_user;
    private $nom;
    private $prenom;
    private $email;
    private $user_password;
    private $role;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo; 
    }

    public function setValues($nom, $prenom, $email, $user_password, $role) {
        $this->nom = htmlspecialchars($nom);
        $this->prenom = htmlspecialchars($prenom);
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->user_password = password_hash($user_password, PASSWORD_BCRYPT);
        $this->role = htmlspecialchars($role);
    }

    public function inscription() {
        $stmt = $this->pdo->prepare("INSERT INTO user (nom, prenom, email, user_password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $this->nom, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->prenom, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->email, PDO::PARAM_STR);
        $stmt->bindParam(4, $this->user_password, PDO::PARAM_STR);
        $stmt->bindParam(5, $this->role, PDO::PARAM_STR);
        header('Location: ../views/index.html');
        $stmt->execute();
    }
}
?>

<?php