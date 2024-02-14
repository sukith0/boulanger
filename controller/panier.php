<?php
session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

$total = 0;

if (empty($_SESSION['panier'])) {
    $message = "Votre panier est vide.";
} else {
    if (count($_SESSION['panier']) > 0) {
        foreach ($_SESSION['panier'] as $key => $produit) {
            echo "Nom du produit : " . $produit['nom_produit'] . "<br>";
            echo "Prix : " . $produit['prix'] . "<br>";
            echo "Quantité : " . $produit['quantite'] . "<br>";
            echo "<form action='supprimer_produit.php' method='post'>";
            echo "<input type='hidden' name='produit' value='$key'>";
            echo "<input type='submit' name='supprimer_produit' value='-'>";
            echo "</form>";
            echo "<form action='supprimer_produit.php' method='post'>";
            echo "<input type='hidden' name='orta' value='$key'>";
            echo "<input type='submit' name='supprimer_produit' value='+'>";
            echo "</form>";
            echo "<form action='supprimer_produit.php' method='post'>";
            echo "<input type='hidden' name='orto' value='$key'>";
            echo "<input type='submit' name='supprimer_produit' value='supprimer'>";
            echo "</form>";
            echo "<hr>";
            $total += $produit['prix'] * $produit['quantite'];
        }
    } else {
        $message = "Votre panier est vide.";
    }
}

require_once("../view/panierview.php");
?>
