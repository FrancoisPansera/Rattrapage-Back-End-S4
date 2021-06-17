<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

if ($_SESSION['admin'] == 1) { // On vérifie que l'utilisateur est admin

   $client = $_POST['clientid']; // Récupération des données
   $velo = $_POST['veloid'];
   $facturation = $_POST['facid'];
   $livraison = $_POST['livid'];
   $commande = $_POST['id_commande'];

   $DB->delete(
      "UPDATE commande
SET client_id = '$client',
velo_id = '$velo',
facturation = '$facturation',
livraison = '$livraison'
WHERE id = $commande;"
   );
} else {
   header("Location:../Accueil.php");
   die();
}
header("Location:../Accueil.php");
die();
