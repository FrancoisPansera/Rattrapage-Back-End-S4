<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

if (isset($_SESSION['admin'])) { // On vérifie que l'utilisateur est connecté

      $id_commentaire = $_GET['Id_Commentaire']; // Récupération des données

      $results = $DB->select("SELECT id
      FROM commentaire
      WHERE id = $id_commentaire"); // On vérifie que le commentaire existe
      if ($results->rowCount() > 0) {// Si il existe, on le supprime
            $DB->delete(
                  "DELETE FROM aime WHERE commentaire_id = $id_commentaire;
                  DELETE FROM commentaire WHERE id = $id_commentaire;"
            );
      } else {
      }
} else {
}

header("Location:../Accueil.php");
die();
