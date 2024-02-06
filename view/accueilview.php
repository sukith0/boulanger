<form action='' method='post'>
        <input type='submit' name='deconnexion' value='Se déconnecter'>
      </form>

<form action='listing.php' method='get'>
        <input type='submit' value='Tous les articles'>
      </form>


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