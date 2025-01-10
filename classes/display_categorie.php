<?php
class Display_categorie {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function affichageCategorie() {
        $stmtselect = $this->pdo->prepare('SELECT * FROM categories');
        $stmtselect->execute();
        $result = $stmtselect->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($result)) {
            foreach ($result as $categorie) {
                echo "<option value='" . htmlspecialchars($categorie['id_catr']) . "'>" . htmlspecialchars($categorie['nom_ca']) . "</option>";
            }
        } else {
            echo "<option value=''>Aucune catégorie disponible</option>";
        }
    }
}
?>

