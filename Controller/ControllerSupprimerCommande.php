<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

if ($_SESSION['admin'] == 1) { // On vérifie si l'utilisateur est administrateur
      $commande = $_POST['id_commande']; // Récupération des données
      $DB->delete( // Suppression des données
            "DELETE FROM commande WHERE id = $commande;"
      );
} else {
}

header("Location:../Accueil.php");
die();
