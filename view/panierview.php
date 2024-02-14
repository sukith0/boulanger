<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Panier</title>

</head>

<body>
    
    
    <p>total : <?php echo $total?> €</p>

            <form action='acheter_produit.php' method='post'>
            <input type='hidden' name='orto' value='$key'>
            <input type='submit' name='acheter_produit' value='Commander'>
            </form>
            <a href="../controller/accueil.php">Retour</a>
</body>
</html>


