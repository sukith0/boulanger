<?php
session_start(); 

if (!isset($_SESSION["nom_utilisateur"])) {
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

$messagebienvenue="Bienvenue, " . $_SESSION["nom_utilisateur"] . "!";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deconnexion"])) {
    session_destroy(); 
    header("Location: home.php"); 
    exit();
}


$query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 2";
$resultat = mysqli_query($connexion, $query);
require_once('../view/accueilview.php');
?>