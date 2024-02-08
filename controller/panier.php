<?php
session_start();

// Initialiser le panier s'il n'existe pas déjà dans la session
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

// Initialiser le prix total à 0
$prix_total = 0;

// Vérifier si le panier est vide
if (empty($_SESSION['panier'])) {
    $message = "Votre panier est vide.";
} else {
    // Créer un tableau pour stocker les produits uniques avec leur quantité
    $panier_unique = array();

    // Parcourir le panier pour regrouper les produits avec le même ID
    foreach ($_SESSION['panier'] as $produit) {
        $id_produit = $produit['id_produit'];
        if (isset($panier_unique[$id_produit])) {
            // Si le produit existe déjà dans le tableau temporaire, ajouter la quantité
            $panier_unique[$id_produit]['quantite'] += $produit['quantite'];
        } else {
            // Sinon, ajouter le produit avec sa quantité initiale
            $panier_unique[$id_produit] = $produit;
        }
        // Ajouter le prix du produit au prix total
        $prix_total += $produit['prix'] * $produit['quantite'];
    }

}

$prix_total = number_format($prix_total, 2);


require_once("../view/panierview.php");
?>
