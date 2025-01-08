<?php
require_once '../database/connection.php';

class Inscription {
    private $id_user;
    private $nom;
    private $prenom;
    private $email;
    private $user_password;
    private $role;
    private $profile;
    private $pdo;

    private $profile_path;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function setValues($nom, $prenom, $email, $user_password, $role, $profile, $profile_path) {
        $this->nom = htmlspecialchars($nom);
        $this->prenom = htmlspecialchars($prenom);
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->user_password = password_hash($user_password, PASSWORD_DEFAULT);
        $this->role = htmlspecialchars($role);
        $this->profile = htmlspecialchars($profile);
        $this->profile_path = htmlspecialchars($profile_path); 
    }
    
    
    
    public function register() {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM user WHERE email = ?");
        $stmt->bindParam(1, $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $emailExists = $stmt->fetchColumn();
    
        if ($emailExists > 0) {
            echo "Cet email est déjà utilisé. Veuillez en choisir un autre.";
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO user (nom, prenom, email, user_password, role, profile)  VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $this->nom, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->prenom, PDO::PARAM_STR);
            $stmt->bindParam(3, $this->email, PDO::PARAM_STR);
            $stmt->bindParam(4, $this->user_password, PDO::PARAM_STR);
            $stmt->bindParam(5, $this->role, PDO::PARAM_STR);
            $stmt->bindParam(6, $this->profile_path, PDO::PARAM_STR); 
    
            if ($stmt->execute()) {
                header('Location: ../views/login.php');
                exit;
            } else {
                echo "Une erreur est survenue lors de l'insertion des données.";
            }
        }
    }
    
}
?>
