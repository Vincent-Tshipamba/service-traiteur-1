<?php
class Database
{
    // On déclare les paramètres de connexion à la base de données
    private $host = "localhost"; # Le nom de l'hôte
    private $db_name = "service-traiteur"; # Le nom de la base de données
    private $username = "root"; # Le nom d'utilisateur
    private $password = ""; # Le mot de passe de connexion
    public $conn ;
    // On crée une fonction pour établir la connexion
    public function getConnection()
    {
        # On initialise la variable de connexion
        $this->conn = null;

        // Le bloc Try-Catch permet de gérer les
        // erreurs pouvant survenir lors de la connexion à
        // la base de données
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            // Si une erreur survient, on l'affiche
            echo "Une erreur est survenue lors de la connexion à la base de données : " . $exception->getMessage();
        }

        // On renvoit la variable de connexion afin de pouvoir
        // la réutiliser dans d'autres pages
        return $this->conn;
    }
}