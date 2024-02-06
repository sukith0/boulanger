<?php
session_start(); // Démarrez la session

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION["nom_utilisateur"])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: home.php");
    exit();
}

$serveur = "localhost";
$utilisateur = "phpmyadmin";
$motDePasse = "PN2023Admin";
$baseDeDonnees = "boulanger";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if (!$connexion) {
    die("La connexion a échoué : " . mysqli_connect_error());
}

// Afficher le message de bienvenue
echo "<h2>Bienvenue, " . $_SESSION["nom_utilisateur"] . " !</h2>";

// Bouton de déconnexion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deconnexion"])) {
    session_destroy(); // Détruire la session
    header("Location: home.php"); // Rediriger vers la page de connexion
    exit();
}



// Afficher les produits aléatoires
$query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 2";
$resultat = mysqli_query($connexion, $query);
require_once('../view/accueilview.php');
?>