<?php
session_start();

if (isset($_POST['produit'])) {
    $index_produit = $_POST['produit'];

    if (isset($_SESSION['panier'][$index_produit])) {
        if ($_SESSION['panier'][$index_produit]['quantite'] > 1) {
            $_SESSION['panier'][$index_produit]['quantite']--;
        } else {
            unset($_SESSION['panier'][$index_produit]);
        }
        header("Location: panier.php");
        exit(); 
    } else {
        echo "Erreur: Produit non trouvé dans le panier.";
    }
} else {
    echo "Erreur: Index de produit non spécifié.";
}


if (isset($_POST['orta'])) {
    $index_produit = $_POST['orta'];

    if (isset($_SESSION['panier'][$index_produit])) {
        if ($_SESSION['panier'][$index_produit]['quantite'] > 0) {
            $_SESSION['panier'][$index_produit]['quantite']++;
        } else {
            unset($_SESSION['panier'][$index_produit]);
        }
        header("Location: panier.php");
        exit(); 
    } else {
        echo "Erreur: Produit non trouvé dans le panier.";
    }
} else {
    echo "Erreur: Index de produit non spécifié.";
}


if (isset($_POST['orto'])) {
    $index_produit = $_POST['orto'];

    if (isset($_SESSION['panier'][$index_produit])) {
        unset($_SESSION['panier'][$index_produit]);
        header("Location: panier.php");
        exit(); 
    } else {
        echo "Erreur: Produit non trouvé dans le panier.";
    }
} else {
    echo "Erreur: Index de produit non spécifié.";
}
