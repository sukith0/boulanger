<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Produit</title>
</head>

<body>

    <h2>Fiche Produit</h2>
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



    <form action='' method='post'>
        <input type="hidden" name="id_produit" value="<?php echo $produit['id']; ?>">
        <input type="submit" name="ajouter_panier" value="Ajouter au panier">
    </form>



    <!-- Compteur d'articles -->
    <div style="position: fixed; top: 10px; right: 10px; background-color: #ccc; padding: 5px;">
        <?php
        if (isset($_SESSION['nb_articles_panier'])) {
            echo "Nombre d'articles dans le panier : " . $_SESSION['nb_articles_panier'];
        } else {
            echo "Nombre d'articles dans le panier : 0";
        }
        ?>
    </div>

</body>

</html>
