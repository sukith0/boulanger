<?php
session_start(); 

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

if (isset($_SESSION["nom_utilisateur"])) {
    header("Location: accueil.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_utilisateur = isset($_POST["nom_utilisateur"]) ? $_POST["nom_utilisateur"] : "";
    $mot_de_passe = isset($_POST["mot_de_passe"]) ? $_POST["mot_de_passe"] : "";

    $query = "SELECT * FROM `utilisateurs` WHERE `nom_utilisateur` = '$nom_utilisateur' AND `mot_de_passe` = '$mot_de_passe'";
    $resultat = mysqli_query($connexion, $query);

    if (mysqli_num_rows($resultat) == 1) {
        $utilisateur = $resultat->fetch_assoc();
        $_SESSION["nom_utilisateur"] = $nom_utilisateur;
        $_SESSION["id_utilisateur"] = intval($utilisateur['id']);
        header("Location: accueil.php"); 
        exit();
    } else {
        $message="Échec de la connexion. Vérifiez vos informations d'identification.";
    }
}

mysqli_close($connexion);
require_once('../view/homeview.php');

?>
