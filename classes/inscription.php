<?php
require_once '../database/connection.php';

class Inscription {
    private $id_user;
    private $nom;
    private $prenom;
    private $email;
    private $user_password;
    private $role;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function setValues($nom, $prenom, $email, $user_password, $role) {
        // تعقيم المدخلات
        $this->nom = htmlspecialchars($nom);
        $this->prenom = htmlspecialchars($prenom);
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // تشفير كلمة المرور
        $this->user_password = password_hash($user_password, PASSWORD_DEFAULT);
        $this->role = htmlspecialchars($role);
    }

    public function register() {
        // التأكد من أن البريد الإلكتروني غير موجود مسبقاً
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM user WHERE email = ?");
        $stmt->bindParam(1, $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $emailExists = $stmt->fetchColumn();

        if ($emailExists > 0) {
            echo "البريد الإلكتروني موجود مسبقاً.";
        } else {
            // إدخال المستخدم في قاعدة البيانات
            $stmt = $this->pdo->prepare("INSERT INTO user (nom, prenom, email, user_password, role) VALUES (?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $this->nom, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->prenom, PDO::PARAM_STR);
            $stmt->bindParam(3, $this->email, PDO::PARAM_STR);
            $stmt->bindParam(4, $this->user_password, PDO::PARAM_STR);
            $stmt->bindParam(5, $this->role, PDO::PARAM_STR);

            if ($stmt->execute()) {
                // التوجيه بعد التسجيل بنجاح
                if ($this->role == 'utilisateur') {
                    header('Location: ../views/index.html');
                } else {
                    header('Location: ../views/auteur.php');
                }
                exit;
            } else {
                echo "حدث خطأ أثناء التسجيل.";
            }
        }
    }
}
?>
