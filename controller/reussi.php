<?php

session_start();
$serveur = "localhost";
$utilisateur = "phpmyadmin";
$motDePasse = "PN2023Admin";
$baseDeDonnees = "boulanger";



$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);


$insertInto = "INSERT INTO commandes (user_id, date) VALUES (".$_SESSION["id_utilisateur"].", CURRENT_TIMESTAMP)";
            mysqli_query($connexion, $insertInto);

$commande_id = mysqli_insert_id($connexion);

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}


if (empty($_SESSION['panier'])) {
    $message = "Votre panier est vide.";
} else {
    if (count($_SESSION['panier']) > 0) {
        foreach ($_SESSION['panier'] as $key => $produit) {

    $insertIn = "INSERT INTO commande_product (commande_id, product_id, quantite) VALUES ($commande_id, $key, ".$produit['quantite'].")";
    mysqli_query($connexion, $insertIn);
        }} else {
            $message = "Votre panier est vide.";
        }
    };


    echo "Commande effectué avec succès !";

    