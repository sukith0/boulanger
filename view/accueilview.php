<?php if (isset($messagebienvenue)): ?>
    <h2><?= $messagebienvenue ?></H2>
<?php endif; ?>



    <a href="../controller/logout.php">Déconnexion</a>
    <a href="../controller/listing.php">Tout les produits</a>
    <a href="../controller/panier.php">Votre panier</a>
    <a href="../controller/commandes.php">Vos commandes</a>


    <h2>Produits Pour Vous :</h2>
    
    
<?php
while ($ligne = mysqli_fetch_assoc($resultat)): ?>
    <div>

    <h3><a href='product.php?id=<?php echo $ligne['id']?>' > <?php echo $ligne['name']?></a></h3>

    <p>Prix :       <?php echo $ligne['price']?></p>

    <p>Référence :  <?php echo $ligne['reference']?></p>

    <p>Stock :      <?php echo $ligne['stock']?></p>

    </div>

    


<?php endwhile ?>

<?php
mysqli_close($connexion);
?>