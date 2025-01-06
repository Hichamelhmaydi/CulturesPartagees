<?php
require_once '../database/connection.php';

class displayArticle{
    private $pdo;


    public function __construct($pdo) {
        $this->pdo = $pdo; 

    }
  
    public function displayART() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM article");
            $stmt->execute();
            $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            if (!empty($articles)) {
                foreach ($articles as $article) {
                    echo "<article class='brick entry format-standard animate-this'>";
                    echo "<div class='entry-text'>";
                    echo "<div class='entry-header'>";
                    echo "<div class='entry-meta'>";
                    echo "<span class='cat-links'>";
                    echo "<span style='color: #000;'>CATEGORIE : "  . htmlspecialchars($article['categorie']) . "</span>";
                    echo "</span>";			
                    echo "</div>";
                    echo "<h1 class='entry-title' style='color: #000;'>TITRE : " . htmlspecialchars($article['titre']) . "</h1>";
                    echo "</div>";  
                    echo "<div class='entry-excerpt' style='color: #000;'> CONTENU : <br> ";
                    echo htmlspecialchars($article['contenu']);
                    echo "</div>";
                    echo "<div class='entry-excerpt' style='color: #000;'> AUTEUR : <br> ";
                    echo htmlspecialchars($article['auteur']);
                    echo "</div>";
                    echo "</div>"; 


                    echo "<div class='acc_ref'>";
                    echo "<div class='accepter'>";
                    echo "<button class='accepter_art' name='accepter_art' method='post'>accépter</button>";
                    echo "</div>"; 
                    echo "<div class='refuser'>";
                    echo "<button class='refuser_art' name='refuser_art' method='post'>refuser</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</article>";
                }
            } else {
                echo "Aucun article trouvé.";
            }
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
      
      
}
?>