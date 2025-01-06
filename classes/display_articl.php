<?php
require_once '../database/connection.php';
session_start();
class displayArticle{
    private $pdo;
    private $nom;

    public function __construct($pdo) {
        $this->pdo = $pdo; 
        $this->nom = $_SESSION['user']['nom'];   
    }
  
    public function displayART() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM article WHERE auteur = ?");
            $stmt->execute([$this->nom]);
            $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            if (!empty($articles)) {
                foreach ($articles as $index => $article) {
                    echo "<article class='brick entry format-standard animate-this'>";
                    echo "<div class='entry-text'>";
                    echo "<div class='entry-header'>";
                    echo "<div class='entry-meta'>";
                    echo "<span class='cat-links'>";
                    echo "<span style='color: #000;'>CATEGORIE : " . htmlspecialchars($article['categorie']) . "</span>";
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
