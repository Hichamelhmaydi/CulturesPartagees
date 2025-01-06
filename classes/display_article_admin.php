<?php
require_once '../database/connection.php';

class displayArticle {
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

                    echo "<form method='POST'>"; 
                    echo "<div class='acc_ref'>";
                    echo "<div class='accepter'>";
                    echo "<button type='submit' name='accepter_art' class='accepter_art' value='" . $article['id_art'] . "'>Accepter</button>";
                    echo "</div>"; 
                    echo "<div class='refuser'>";
                    echo "<button type='submit' name='refuser_art' class='refuser_art' value='" . $article['id_art'] . "'>Refuser</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</form>";  

                    if (isset($_POST["accepter_art"]) && $_POST["accepter_art"] == $article['id_art']) {
                        $stmt = $this->pdo->prepare("UPDATE article SET statut = 'accepter' WHERE id_art = :id_art");
                        $stmt->execute(['id_art' => $article['id_art']]);
                    }
                    if (isset($_POST["refuser_art"]) && $_POST["refuser_art"] == $article['id_art']) {
                        $stmt = $this->pdo->prepare("UPDATE article SET statut = 'refuser' WHERE id_art = :id_art");
                        $stmt->execute(['id_art' => $article['id_art']]);
                    }

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
