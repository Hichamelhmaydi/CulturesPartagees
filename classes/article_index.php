<?php
class ArticleIndex {
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
                echo "<div class='entry-thumb'>";
                echo "<img src='" . $article['image_art'] . "' alt='Image de l\'article' style='max-width: 100%; height: auto;'>";
                echo "</div>";
                echo "<div class='entry-meta'>";
                echo "<span class='cat-links'>";
                echo "<span style='color: #000;'>" . htmlspecialchars($article['categorie']) . "</span>";
                echo "</span>";
                echo "</div>";
                echo "<h1 class='entry-title' style='color: #000;'>" . htmlspecialchars($article['titre']) . "</h1>";
                echo "</div>";
                echo "<div class='entry-excerpt' style='color: #000;'><br>";
                echo htmlspecialchars($article['contenu']);
                echo "</div>";
                echo "</div>";

                echo "<div class='entry-like-button' style='margin-top: 15px;'>";
                echo "<button class='like-button' onclick='likeArticle(" . $article['id_art'] . ")' style='background-color: transparent; border: none; cursor: pointer;'>";
                echo "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24' fill='#007BFF'>";
                echo "<path d='M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z'/>";
                echo "</svg>";
                echo "</button>";
                echo "<span id='like-count-" . $article['id_art'] . "' style='margin-left: 10px;'></span>"; // Affiche le nombre de likes
                echo "</div>";

                echo "</article>";
            }
        } else {
            echo "<p style='color: #000; text-align: center;'>il y a aucun article</p>";
        }
    }
}
?>