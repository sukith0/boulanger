<?php
session_start();

$serveur = "localhost";
$utilisateur = "phpmyadmin";
$motDePasse = "PN2023Admin";
$baseDeDonnees = "boulanger";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if (!$connexion) {
    die("La connexion a échoué : " . mysqli_connect_error());
}

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION["nom_utilisateur"])) {
    header("Location: home.php");
    exit();
}

// Récupérez les articles du panier de l'utilisateur
$queryPanier = "SELECT COUNT(*) AS nb_articles FROM `panier` WHERE `id_user` = '{$_SESSION["nom_utilisateur"]}'";
$resultPanier = mysqli_query($connexion, $queryPanier);
$rowPanier = mysqli_fetch_assoc($resultPanier);
$nbArticlesPanier = $rowPanier['nb_articles'];
require_once("../view/panierview.php");
mysqli_close($connexion);
?>