<?php

$serveur = "localhost";
$utilisateur = "phpmyadmin";
$motDePasse = "PN2023Admin";
$baseDeDonnees = "boulanger";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if (!$connexion) {
    die("La connexion a échoué : " . mysqli_connect_error());
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idProduit = $_GET['id'];

    $query = "SELECT * FROM `products` WHERE id = $idProduit";
    $resultat = mysqli_query($connexion, $query);

    if (!$resultat) {
        die("La requête a échoué : " . mysqli_error($connexion));
    }

    $produit = mysqli_fetch_assoc($resultat);
    require_once("../view/productview.php");
    ?>

        <?php
        // Traitement des formulaires
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["reserver"])) {
                // Code pour réduire le stock et enregistrer la réservation dans la base de données
                $query = "UPDATE `products` SET `stock` = `stock` - 1 WHERE `id` = $idProduit";
                mysqli_query($connexion, $query);

                // Vous pouvez également enregistrer les détails de la réservation dans une table de réservations si nécessaire

                echo "<p>Produit réservé avec succès!</p>";
            } elseif (isset($_POST["annuler_reservation"])) {
                // Code pour annuler la réservation et augmenter le stock dans la base de données
                $query = "UPDATE `products` SET `stock` = `stock` + 1 WHERE `id` = $idProduit";
                mysqli_query($connexion, $query);

                // Vous pouvez également supprimer l'enregistrement de la réservation dans la table de réservations si nécessaire

                echo "<p>Réservation annulée avec succès!</p>";
            }
        }

        ?>
        
        
<?php

} else {
    echo "<p>Identifiant de produit non valide.</p>";
}

mysqli_close($connexion);
?>
