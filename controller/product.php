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

// Initialiser le panier s'il n'existe pas déjà dans la session
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idProduit = $_GET['id'];

    $query = "SELECT * FROM `products` WHERE id = $idProduit";
    $resultat = mysqli_query($connexion, $query);

    if (!$resultat) {
        die("La requête a échoué : " . mysqli_error($connexion));
    }

    $produit = mysqli_fetch_assoc($resultat);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ajouter_panier"])) {
        $idProduit = $_POST["id_produit"];
        
        if ($produit['stock'] > 0) {
            $queryUpdateStock = "UPDATE `products` SET `stock` = `stock` - 1 WHERE `id` = $idProduit";
            mysqli_query($connexion, $queryUpdateStock);

            // Ajouter le produit au panier de l'utilisateur
            $panier_produit = array(
                'id_produit' => $produit['id'],
                'nom_produit' => $produit['name'],
                'prix' => $produit['price'],
                'quantite' => 1 // Nous ajoutons toujours une quantité de 1 lorsque l'utilisateur ajoute un produit
            );

            $_SESSION['panier'][] = $panier_produit;

            $reservationReussi = "Produit ajouté au panier avec succès !";
        } else {
            $messageErreur = "Désolé, ce produit est actuellement en rupture de stock.";
        }
    }

    
} else {
    echo "<p>Identifiant de produit non valide.</p>";
}
require_once("../view/productview.php");
mysqli_close($connexion);
?>
