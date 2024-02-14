<?php

session_start();

$serveur = "localhost";
$utilisateur = "phpmyadmin";
$motDePasse = "PN2023Admin";
$baseDeDonnees = "boulanger";



$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);




if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

if (empty($_SESSION['panier'])) {
    $message = "Votre panier est vide.";
} else {
    if (count($_SESSION['panier']) > 0) {
        foreach ($_SESSION['panier'] as $key => $produit) {
            echo "Nom du produit : " . $produit['nom_produit'] . "<br>";
            echo "Prix : " . $produit['prix'] . "<br>";
            echo "Quantité : " . $produit['quantite'] . "<br>"; 


        }} else {
            $message = "Votre panier est vide.";
        }
    };

require_once("../view/achatview.php");
