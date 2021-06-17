<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

$id_client = $_SESSION['Client']; // Récupération des données
$id_commentaire = $_POST['commentaire'];
$commentaire = $_POST['commentairevaleur'];
$result = $DB->delete( // Mise à jour du commentaire
    "UPDATE commentaire
    SET commentaire = '$commentaire'
    WHERE id = $id_commentaire AND client_id = $id_client;"
);

header("Location:../Accueil.php");
die();
