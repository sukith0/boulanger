<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
</head>
<body>


<h2>Produits :</h2>

<table>
<tr>
        <th>IDs</th>
        <th>Noms</th>
        <th>Prix</th>
        <th>Références</th>
        <th>Stock</th>
    </tr>

    <?php while ($ligne = mysqli_fetch_assoc($resultat)): ?>
        <tr>
            <td> <?php echo $ligne['id'] ?></td>
            <td><a href="product.php?id=<?php echo $ligne['id']?>" > <?php echo $ligne['name']?></a></td>
            <td><?php echo $ligne['price']?></td>
            <td><?php echo $ligne['reference']?></td>
            <td><?php echo $ligne['stock']?></td>
        </tr>
    <?php endwhile ?>
<?php   
mysqli_close($connexion);
?>


</table>


</body>
</html>