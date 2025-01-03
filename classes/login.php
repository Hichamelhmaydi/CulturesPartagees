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
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = ?");
            $stmt->bindParam(1, $this->email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user) {
                if (password_verify($this->password, $user['user_password'])) {
                    $_SESSION['user'] = [
                        'id_user' => $user['id_user'],
                        'nom' => $user['nom'],
                        'prenom' => $user['prenom'],
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];
                    if ($user['role'] == 'utilisateur') {
                        header('Location: ../views/index.html');
                        exit;
                    } elseif ($user['role'] == 'auteur') {
                        header('Location: ../views/auteur.php');
                        exit;
                    }
                } else {
                    echo "Mot de passe incorrect.";
                    return;
                }
            }
    
            $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE email = ?");
            $stmt->bindParam(1, $this->email, PDO::PARAM_STR);
            $stmt->execute();
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($admin) {
                if ($this->password === $admin['admin_password']) {
                    $_SESSION['admin'] = [
                        'email' => $admin['email']
                    ];
                    header("Location: ../views/auteur_dashboard.php");
                    exit;
                } else {
                    echo "Mot de passe incorrect pour l'administrateur.";
                    return;
                }
            }
    
            echo "Adresse e-mail ou mot de passe incorrect.";
        } catch (Exception $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
    
    
}
?>
