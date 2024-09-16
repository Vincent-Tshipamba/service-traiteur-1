<?php
// Définition de la classe Auth qui gère l'authentification des utilisateurs
class Auth
{
    // Propriété privée qui stocke l'instance de PDO pour la connexion à la base de données
    private $db;

    // Constructeur de la classe Auth qui est appelé lors de l'instanciation de la classe
    public function __construct($pdo)
    {
        // Affectation de l'instance de PDO à la propriété $db
        $this->db = $pdo;

        // Démarrage de la session pour stocker les informations de l'utilisateur
        session_start();
    }

    // Méthode pour vérifier les informations d'identification de l'utilisateur
    public function login($email, $password, $rememberMe)
    {
        // Préparation et exécution de la requête pour récupérer l'utilisateur par email
        $stmt = $this->db->prepare('SELECT id, email, password FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        // Vérification si l'utilisateur existe et si le mot de passe est valide
        if ($user && password_verify($password, $user['password'])) {
            // Authentification de l'utilisateur
            $_SESSION['authenticated'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            // Si l'utilisateur a coché "Se souvenir de moi", création d'un cookie pour stocker le token
            if ($rememberMe) {
                $this->setRememberMe($user['id']);
            }

            // Retourne vrai si l'authentification est réussie
            return true;
        } else {
            // Retourne faux si l'authentification échoue
            return false;
        }
    }

    // Méthode pour créer un cookie pour "Se souvenir de moi"
    private function setRememberMe($userId)
    {
        // Génération d'un token unique pour l'utilisateur
        $token = bin2hex(random_bytes(16));

        // Définition de la date d'expiration du token (30 jours)
        $expiry = time() + 86400 * 30;

        // Stockage du token dans la base de données avec l'ID utilisateur
        $stmt = $this->db->prepare('INSERT INTO remember_me (user_id, token, expiry) VALUES (:user_id, :token, :expiry) ON DUPLICATE KEY UPDATE token = :token, expiry = :expiry');
        $stmt->execute(['user_id' => $userId, 'token' => $token, 'expiry' => $expiry]);

        // Création d'un cookie pour stocker le token
        setcookie('remember_me', $token, $expiry, '/', '', false, true);
    }

    // Méthode pour vérifier si l'utilisateur est authentifié
    public function isAuthenticated()
    {
        // Vérification si l'utilisateur est déjà authentifié via la session
        if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
            return true;
        }

        // Vérification si l'utilisateur a un cookie "Se souvenir de moi"
        if (isset($_COOKIE['remember_me'])) {
            return $this->checkRememberMeToken($_COOKIE['remember_me']);
        }

        // Retourne faux si l'utilisateur n'est pas authentifié
        return false;
    }

    // Méthode pour vérifier le token de "Se souvenir de moi"
    private function checkRememberMeToken($token)
    {
        // Requête pour récupérer les informations de l'utilisateur liées au token
        $stmt = $this->db->prepare('SELECT user_id, expiry FROM remember_me WHERE token = :token');
        $stmt->execute(['token' => $token]);
        $data = $stmt->fetch();

        // Vérification si le token est valide et si la date d'expiration n'est pas dépassée
        if ($data && $data['expiry'] > time()) {
            // Authentification de l'utilisateur et recréation de la session
            $_SESSION['authenticated'] = true;
            $_SESSION['user_id'] = $data['user_id'];

            return true;
        }

        return false;
    }

    // Méthode pour se déconnecter
    public function logout()
    {
        // Suppression de la session
        session_unset();
        session_destroy();

        // Suppression du cookie de "Se souvenir de moi"
        if (isset($_COOKIE['remember_me'])) {
            setcookie('remember_me', '', time() - 3600, '/', '', false, true);
        }
    }
}
