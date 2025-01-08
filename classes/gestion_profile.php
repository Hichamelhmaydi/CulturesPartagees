<?php
require_once '../database/Connection.php';
    session_start(); 
    class GestionProfile{
        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }
        public function getProfileById($id) {
            $stmt = $this->pdo->prepare("SELECT * FROM user WHERE id_user = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        public function updateProfile($id_user, $nom, $prenom, $email, $user_password) {
            $stmt = $this->pdo->prepare("UPDATE user SET nom = ?, prenom = ?, email = ?, user_password = ? WHERE id_user = ?");
            $stmt->bindParam(1, $nom, PDO::PARAM_STR);
            $stmt->bindParam(2, $prenom, PDO::PARAM_STR);
            $stmt->bindParam(3, $email, PDO::PARAM_STR);
            $stmt->bindParam(4, $user_password, PDO::PARAM_STR);
            $stmt->bindParam(5, $id_user, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

?>