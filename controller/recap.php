<?php 
session_start();

$serveur = "localhost";
$utilisateur = "phpmyadmin";
$motDePasse = "PN2023Admin";
$baseDeDonnees = "boulanger";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idCommande = $_GET['id'];


$select = "SELECT * FROM `commandes` WHERE user_id= "  .$_SESSION["id_utilisateur"]. " AND id = $idCommande";
$resultat  = mysqli_query($connexion, $select);

if (mysqli_num_rows($resultat) == 0) {
    die("La requête a échoué : " . mysqli_error($connexion));
}

$commande = mysqli_fetch_assoc($resultat);

$select2 = "SELECT * FROM `commande_product` WHERE commande_id = " .$idCommande."";
$resultat2  = mysqli_query($connexion, $select2);



while ($lienProduct = mysqli_fetch_assoc($resultat2)) {    

    $select3 = "SELECT * FROM `products` WHERE id = " .$lienProduct['product_id'];
    $resultat3 = mysqli_query($connexion, $select3);
    $product = mysqli_fetch_assoc($resultat3);
    echo "produit :"." ". $lienProduct["quantite"]." ". $product["name"]." ".$product["price"]."€". "<br>";

}}


