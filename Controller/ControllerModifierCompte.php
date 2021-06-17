<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

if (isset($_GET['Id_Client']) && $_SESSION['admin'] == 1) { // On regarde si un id client a été envoyé et que l'utilisateur est admin
    $client_id = $_GET['Id_Client']; // Récupération de l'id par GET
} else {
    $client_id = $_SESSION['Client']; // Récupération de l'id par SESSION
}
$nom = $_POST['nom'];// Récupération des données
$prenom = $_POST['prenom'];
$DB->delete( // Mise à jour du compte
    "UPDATE client
SET nom = '$nom',
prenom = '$prenom'
WHERE id = $client_id;"
);

if (isset($_GET['Id_Client']) && $_SESSION['admin'] == 1) { // Redirection personnalisée pour les admins
    header("Location:../ApercuProfil.php?Id_Client=" . $client_id);
    die();
} else {
    header("Location:../Profil.php");
    die();
}
