<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    
<?php if (isset($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<h2>Connexion</h2>
<form action='' method='post'>
    <label for='nom_utilisateur'>Nom d'utilisateur :</label>
    <input type='text' name='nom_utilisateur' required>

    <label for='mot_de_passe'>Mot de passe :</label>
    <input type='password' name='mot_de_passe' required>

    <input type='submit' value='Se connecter'>
</form>

</body>
</html>
