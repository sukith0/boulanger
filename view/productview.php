<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Produit</title>
</head>
<body>

<h2>Fiche Produit</h2>
<!-- Affichage des détails du produit -->
<table>
    <tr>
        <th>ID</th>
        <td><?php echo isset($produit['id']) ? $produit['id'] : 'N/A'; ?></td>
    </tr>
    <tr>
        <th>Nom</th>
        <td><?php echo isset($produit['name']) ? $produit['name'] : 'N/A'; ?></td>
    </tr>
    <tr>
        <th>Prix</th>
        <td><?php echo isset($produit['price']) ? $produit['price'] : 'N/A'; ?></td>
    </tr>
    <tr>
        <th>Référence</th>
        <td><?php echo isset($produit['reference']) ? $produit['reference'] : 'N/A'; ?></td>
    </tr>
    <tr>
        <th>Stock</th>
        <td><?php echo isset($produit['stock']) ? $produit['stock'] : 'N/A'; ?></td>
    </tr>
</table>

<!-- Formulaire pour ajouter le produit au panier -->
<form action='' method='post'>
    <input type="hidden" name="id_produit" value="<?php echo $produit['id']; ?>">
    <input type="submit" name="ajouter_panier" value="Ajouter au panier">
</form>

<!-- Affichage du panier -->
<h2>Panier</h2>
<?php
// Vérifier si le panier est vide
if (empty($_SESSION['panier'])) {
    echo "Votre panier est vide.";
} else {
    // Afficher les produits dans le panier
    ?>
    
    <table>
        <tr>
            <th>ID Produit</th>
            <th>Nom Produit</th>
            <th>Prix</th>
            <th>Quantité</th>
        </tr>

        <?php foreach ($_SESSION['panier'] as $produit_panier) { ?>

            <tr>
                <td><?php echo $produit_panier['id_produit']; ?></td>
                <td><?php echo $produit_panier['nom_produit']; ?></td>
                <td><?php echo $produit_panier['prix']; ?></td>
                <td><?php echo $produit_panier['quantite']; ?></td>
            </tr>

        <?php } ?>

    </table>

<?php } ?>




</body>
</html>

<?php
mysqli_close($connexion);
?>