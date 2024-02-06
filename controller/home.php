<?php


session_start(); // Démarrez la session

$serveur = "localhost";
$utilisateur = "phpmyadmin";
$motDePasse = "PN2023Admin";
$baseDeDonnees = "boulanger";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (!$connexion) {
    die("La connexion a échoué : " . mysqli_connect_error());
}

// Vérifiez si l'utilisateur est connecté
if (isset($_SESSION["nom_utilisateur"])) {
    // Utilisateur connecté, rediriger vers la page d'accueil
    header("Location: accueil.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_utilisateur = isset($_POST["nom_utilisateur"]) ? $_POST["nom_utilisateur"] : "";
    $mot_de_passe = isset($_POST["mot_de_passe"]) ? $_POST["mot_de_passe"] : "";

    // Vérifiez les informations d'identification dans la base de données
    $query = "SELECT * FROM `utilisateurs` WHERE `nom_utilisateur` = '$nom_utilisateur' AND `mot_de_passe` = '$mot_de_passe'";
    $resultat = mysqli_query($connexion, $query);

    if (mysqli_num_rows($resultat) == 1) {
        $_SESSION["nom_utilisateur"] = $nom_utilisateur;
        header("Location: accueil.php"); // Rediriger vers la page d'accueil
        exit();
    } else {
        $message="Échec de la connexion. Vérifiez vos informations d'identification.";
    }
}
require_once('../view/homeview.php');
// Afficher le formulaire de connexion
?>

<?php

mysqli_close($connexion);?>