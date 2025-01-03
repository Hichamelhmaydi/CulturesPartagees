<?php
class AddCategorie {
    private $nom_ca;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function setValeus($nom_ca) {
        $this->nom_ca = htmlspecialchars($nom_ca); 
    }

    public function AddCategorie() {
       
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM categories WHERE nom_ca = ?");
        $stmt->bindParam(1, $this->nom_ca, PDO::PARAM_STR);
        $stmt->execute();
        $nom_caExists = $stmt->fetchColumn();

        if ($nom_caExists > 0) {
            echo "ce nom déja existant";
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO categories (nom_ca) VALUES (?)");
            $stmt->bindParam(1, $this->nom_ca, PDO::PARAM_STR);
            $stmt->execute();
            echo "Catégorie ajoutée avec succès";
            header('Location: ../views/admin_dashboaed.php');
        }
    }
}
?>

