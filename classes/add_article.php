<?php
require_once '../database/connection.php';

class Article {
    private $id_art;
    private $titre;
    private $contenu;
    private $statut;
    private $auteur;
    private $categorie;
    private $imagePath;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->statut = 'en attente';  
    }

    public function setValues($titre, $contenu, $auteur, $categorie,$imagePath) {
        $this->titre = htmlspecialchars($titre);
        $this->contenu = htmlspecialchars($contenu);
        $this->auteur = htmlspecialchars($auteur);
        $this->categorie = htmlspecialchars($categorie);
        $this->imagePath = $imagePath;
    }

    public function ajouterArticle() {
        
    
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM user WHERE LOWER(nom) = LOWER(?) AND role = 'auteur'");
        $stmt->bindParam(1, $this->auteur, PDO::PARAM_STR);
        $stmt->execute();
        $resultAuteur = $stmt->fetchColumn();

        



        
    
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM categories WHERE nom_ca = ?");
        $stmt->bindParam(1, $this->categorie, PDO::PARAM_STR);
        $stmt->execute();
        $resultCategorie = $stmt->fetchColumn();
    
        if ($resultAuteur > 0) {
            if ($resultCategorie > 0) {
                $stmt = $this->pdo->prepare('INSERT INTO article (titre, contenu, statut, auteur, categorie,image_art) VALUES (?, ?, ?, ?, ?,?)');
                $stmt->bindParam(1, $this->titre, PDO::PARAM_STR);
                $stmt->bindParam(2, $this->contenu, PDO::PARAM_STR);
                $stmt->bindParam(3, $this->statut, PDO::PARAM_STR);
                $stmt->bindParam(4, $this->auteur, PDO::PARAM_STR);
                $stmt->bindParam(5, $this->categorie, PDO::PARAM_STR);
                $stmt->bindParam(6, $this->imagePath);
                if ($stmt->execute()) {
                    echo "Article ajouté avec succès!";
                } else {
                    echo "Erreur lors de l'ajout de l'article.";
                }
            } else {
                echo "La catégorie spécifiée n'existe pas dans la base de données.";
            }
        } 
    }
    
}
?>
