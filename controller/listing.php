<?php
$serveur = "localhost";
$utilisateur = "phpmyadmin";
$motDePasse = "PN2023Admin";
$baseDeDonnees = "boulanger";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if (!$connexion) {
    die("La connexion a échoué : " . mysqli_connect_error());
}

$query = "SELECT * FROM `products`";
$resultat = mysqli_query($connexion, $query);
require_once('../view/listingview.php')
?>

