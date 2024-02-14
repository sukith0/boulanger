<?php 
session_start();

$serveur = "localhost";
$utilisateur = "phpmyadmin";
$motDePasse = "PN2023Admin";
$baseDeDonnees = "boulanger";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

$select = "SELECT * FROM `commandes` WHERE user_id = " . $_SESSION["id_utilisateur"];
$resultat  = mysqli_query($connexion, $select);

if (!$resultat) {
    die("La requête a échoué : " . mysqli_error($connexion));
}




require_once("../view/commandesview.php");