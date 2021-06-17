<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

if (isset($_SESSION['admin']) == 1) { // Vérification que l'utilisateur est connecté
  $id_velo = $_POST['id_velo'];// Récupération des données
  $id_client = $_SESSION['Client'];
  $commentaire = $_POST['commentaire'];

  $DB->insert(
    "INSERT INTO `commentaire` (`id`, `velo_id`, `client_id`,`commentaire`) 
  VALUES (NULL, '$id_velo', '$id_client', '$commentaire')"
  );

  header("Location:../PageVelo.php?Id_Velo=" . $id_velo);//Redirection
  die();
} else {
  echo "Veuillez vous connecter pour commenter"; // Si il n'est pas connecté
  header("Location:../Connexion.php");//Redirection
  die();
}
