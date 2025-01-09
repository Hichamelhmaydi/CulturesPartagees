<?php
session_start();
require_once '../database/Connection.php';

class GestionProfile {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function affichage($id_user) {
        $stmt = $this->pdo->prepare("SELECT profile FROM user WHERE id_user = ?");
        $stmt->bindParam(1, $id_user, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result && isset($result['profile'])) {
            $imagePath = realpath(__DIR__ . '/../uploads/' . $result['profile']);
            if (file_exists($imagePath)) {
                $imageURL = '../uploads/' . $result['profile'];
                echo "<div class='content-media'>";
                echo "<img src='$imageURL' alt='Profile Image' style='width: 150px; height: 150px; border-radius: 50%;'>";
                echo "</div>";
            } else {
                echo "<div class='content-media'>No profile image found at $imagePath.</div>";
            }
        } else {
            echo "<div class='content-media'>No user found.</div>";
        }
    }
    
    public function getProfileById($id_user) {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE id_user = ?");
        $stmt->bindParam(1, $id_user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfile($id_user, $nom, $prenom, $email, $user_password, $profile_image = null) {
        $query = "UPDATE user SET nom = ?, prenom = ?, email = ?, user_password = ?";
        if ($profile_image) {
            $query .= ", profile = ?";
        }
        $query .= " WHERE id_user = ?";
        
        $stmt = $this->pdo->prepare($query);

        if ($profile_image) {
            $stmt->execute([$nom, $prenom, $email, $user_password, $profile_image, $id_user]);
        } else {
            $stmt->execute([$nom, $prenom, $email, $user_password, $id_user]);
        }
    }
}
?>
