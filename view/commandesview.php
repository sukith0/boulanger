<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    
</header>
<body>

<?php while ($order = mysqli_fetch_assoc($resultat)):?>
    <br><a href="../controller/recap.php?id=<?php echo $order["id"]?>">commande : ID<?php echo $order["id"]." ". $order["date"]?></a></br>
<?php endwhile ?>
    
</body>
</html>