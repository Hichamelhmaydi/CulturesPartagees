<?php
class Categorie {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllCategories() {
        $stmt = $this->pdo->prepare("SELECT * FROM categories");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE id_catr = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCategory($id, $nom_ca) {
        $stmt = $this->pdo->prepare("UPDATE categories SET nom_ca = ? WHERE id_catr = ?");
        $stmt->bindParam(1, $nom_ca, PDO::PARAM_STR);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function render() {
        if (!isset($_POST['edit']) && !isset($_POST['update'])) {
            $categories = $this->getAllCategories();
            echo '<h1>Liste des catégorie</h1>';
            echo '<table border="1" style="width: 50%; margin: auto; text-align: center;">';
            echo '<tr><th>ID</th><th> nom de catégorie</th><th>modifier</th></tr>';
            foreach ($categories as $category) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($category['id_catr']) . '</td>';
                echo '<td>' . htmlspecialchars($category['nom_ca']) . '</td>';
                echo '<td>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="category_id" value="' . htmlspecialchars($category['id_catr']) . '">
                            <button type="submit" name="edit">modifier</button>
                        </form>
                      </td>';
                echo '</tr>';
            }
            echo '</table>';
        }

        if (isset($_POST['edit'])) {
            if (isset($_POST['category_id'])) {
                $category = $this->getCategoryById($_POST['category_id']);
                if ($category) {
                    echo '<h1>modifier la catégorie</h1>';
                    echo '<form method="POST">';
                    echo '<input type="hidden" name="category_id" value="' . htmlspecialchars($category['id_catr']) . '">';
                    echo '<label for="category_name"> nom de catégorie:</label>';
                    echo '<input type="text" id="category_name" name="category_name" value="' . htmlspecialchars($category['nom_ca']) . '" required>';
                    echo '<button type="submit" name="update">mise a jour</button>';
                    echo '</form>';
                } else {
                    echo '<p> catégorie pas exiset.</p>';
                }
            } else {
                echo '<p>error dans id</p>';
            }
        }

        if (isset($_POST['update'])) {
            if (!empty($_POST['category_id']) && !empty($_POST['category_name'])) {
                $id = $_POST['category_id'];
                $nom_ca = $_POST['category_name'];
                $this->updateCategory($id, $nom_ca);
                echo '<p style="color: green;">modification avec succes</p>';
                header("Refresh: 2");
            } else {
                echo '<p style="color: red;"> entre le nom de catéforie.</p>';
            }
        }
    }
}
?>
