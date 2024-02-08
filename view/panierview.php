<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Panier</title>
</head>

<body>

    <h2>Votre Panier :</h2>
    <?php foreach ($panier_unique as $produit) { ?>

    <hr>
        <br>Nom du produit : <?php echo $produit['nom_produit']; ?></br>
        <br>Prix : <?php echo $produit['prix']; ?> €</br>
        <br>Quantité : <?php echo $produit['quantite']; ?></br>
    </hr>
    
    <?php } ?>
    
    <h3>Prix total :</h3>
    <p><?php echo $prix_total?> €</p>

</body>
</html>
