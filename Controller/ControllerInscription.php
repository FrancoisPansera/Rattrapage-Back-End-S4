<?php
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

$password = $_POST['motdepasse']; // On récupère le mot de passe
$result = $DB->insert( // On crée un client avec le nom et prénom renseigné
  "INSERT INTO `client` (`id`,`nom`,`prenom`)
  VALUES (NULL,'$_POST[nom]','$_POST[prenom]');
"
);
// On récupère l'id du compte créé
$results = $DB->select("SELECT id FROM client where nom = '$_POST[nom]' AND prenom = '$_POST[prenom]' ORDER BY id DESC");
$row = $results->fetch();
$nouveauid = $row['id'];
//On ajoute une entrée dans la table connexion, avec le mot de passe, l'user et l'id du compte
$result = $DB->insert(
  "INSERT INTO `connexion` (`username`,`password`,`client_id`, `admin`)
VALUES ('$_POST[identifiant]', '$_POST[motdepasse]', (SELECT id FROM client WHERE nom = '$_POST[nom]' AND prenom = '$_POST[prenom]'), 0);
"
);

header("Location:../Accueil.php");
die();
