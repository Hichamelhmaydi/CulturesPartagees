<?php

class articleIndex {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getPdo() {
        return $this->pdo;
    }

    public function displayIndex() {
        $sql = 'SELECT * FROM article WHERE statut = "accepter"';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            foreach ($result as $article) {
                echo "<article class='brick entry format-standard animate-this'>";
                echo "<div class='entry-text'>";
                echo "<div class='entry-header'>";
                echo "<div class='entry-meta'>";
                echo "<span class='cat-links'>";
                echo "<span style='color: #000;'>  " . htmlspecialchars($article['categorie']) . "</span>";
                echo "</span>";			
                echo "</div>";
                echo "<h1 class='entry-title' style='color: #000;'>  " . htmlspecialchars($article['titre']) . "</h1>";
                echo "</div>";  
                echo "<div class='entry-excerpt' style='color: #000;'>   <br> ";
                echo htmlspecialchars($article['contenu']);
                echo "</div>";
                echo "</div>"; 
                echo "</article>";
            }
        } else {
            echo "Aucun article trouvé.";
        }
    }
}


?>