<?php
class Connection {
    private $host;
    private $port;
    private $user;
    private $password;
    private $database;
    private $pdo;

    public function __construct() {
        $this->host = "localhost";
        $this->port = "3306";
        $this->user = "root";
        $this->password = "";
        $this->database = "CulturesPartagees";

        try {
            $dsn = "mysql:host=".$this->host.";port=".$this->port.";dbname=".$this->database;
            $this->pdo = new PDO($dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getPDO() {
        return $this->pdo; 
    }
}
?>