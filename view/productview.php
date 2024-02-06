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
            <?php if ($produit['stock'] > 0) : ?>
                <input type='submit' name='reserver' value='Réserver'>
            <?php else : ?>
                <p>Désolé, ce produit est actuellement en rupture de stock.</p>
            <?php endif; ?>
        </form>

        <form action='' method='post'>
            <?php if ($produit['stock']) : ?>
                <input type='submit' name='annuler_reservation' value='Annuler la réservation'>
            <?php endif; ?>
        </form>


    </body>

    </html>

