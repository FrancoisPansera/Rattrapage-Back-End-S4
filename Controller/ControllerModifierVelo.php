<?php
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

$id_velo = $_GET['Id_Velo']; // Récupération des données
$nom = $_POST['nom'];
$description = $_POST['description'];
$stock = $_POST['stock'];
$result = $DB->delete( // Mise à jour de la base de données
    "UPDATE velo
SET nom = '$nom',
description = '$description',
stock = '$stock'
WHERE id = $id_velo;"
);

header("Location:../Accueil.php");
die();
