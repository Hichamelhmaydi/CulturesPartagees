<?php
require_once ('../database/connection.php');
class DisplayAime{
    private $pdo;

 public function __construct($pdo) {
    $this->pdo = $pdo;
}
public function displayAim() {
    try {
        $stmtselect = $this->pdo->prepare('SELECT * FROM aime');
        $stmtselect->execute();
        
        $resulte = $stmtselect->fetchAll(PDO::FETCH_ASSOC);

        if (empty($resulte)) {
            echo "<p style='color: gray;'>Aucun article trouvé pour le moment.</p>";
            return;
        }

        foreach ($resulte as $index => $article) {
            echo "<article class='brick entry format-standard animate-this'>";
            echo "<div class='entry-text'>";
                echo "<div class='entry-header'>";
                    echo "<div class='entry-meta'></div>";
                    echo "<h1 class='entry-title' style='color: #000;'>TITRE : " . htmlspecialchars($article['titre_aime']) . "</h1>";
                echo "</div>";
                echo "<div class='entry-excerpt' style='color: #000;'>CONTENU : <br>";
                    echo htmlspecialchars($article['contenu_aime']);
                echo "</div>";
            echo "</div>";
            echo "</article>";
        }
    } catch (Exception $e) {
        echo "<p style='color: red;'>Erreur lors de la récupération des articles : " . $e->getMessage() . "</p>";
    }
}

}
?>