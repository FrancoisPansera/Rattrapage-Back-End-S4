<?php
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

if (empty($_GET['Commande'])) { // Si $_GET['Commande'] est NULL ou non défini
  echo "Identifiant de commande incorrect";
} else {
  $id_commande = $_GET['Commande']; // On récupère l'id de commande
  $results1 = $DB->select("SELECT commande.id AS comid, client.id AS clid, client.nom AS clnom, client.prenom AS clpre, velo.id AS velid, velo.nom AS velnom, velo.description AS veldesc
FROM commande
INNER JOIN client ON client.id = commande.client_id
INNER JOIN velo ON velo.id = commande.velo_id
WHERE commande.id = $id_commande
LIMIT 1");
  if ($results1->rowCount() > 0) { // Si il ya des résultats
    while ($row = $results1->fetch()) { // On affiche et met en forme les résultats
      echo    "<br>";
      echo    "<div  style='border: solid;'>";
      echo     "Informations de la commande :";
      echo    "<br>";
      echo    "Numéro de commande : " . $row['comid'];
      echo    "<br>";
      echo    "Numéro client : " . $row['clid'];
      echo    "<br>";
      echo    "Nom : " . $row['clnom'];
      echo    "<br>";
      echo    "Prénom : " . $row['clpre'];
      echo    "<br>";
      echo    "Numéro du vélo : " . $row['velid'];
      echo    "<br>";
      echo    "Nom du vélo : " . $row['velnom'];
      echo    "<br>";
      echo    "Description du vélo : " . $row['veldesc'];
      echo    "<br>";
      echo    "</div>";
    }
  } else {
    echo "<br>";
    echo "Impossible de trouver la commande";
  }

// On affiche l'adresse de livraison
  $results2 = $DB->select("SELECT adresse.id AS aid, adresse.code_postal AS aacp, adresse.ville AS aville, adresse.rue AS arue, adresse.numero AS anum
FROM adresse
INNER JOIN commande ON adresse.id = commande.livraison
WHERE commande.id = $id_commande
LIMIT 1");
  if ($results2->rowCount() > 0) {
    while ($row = $results2->fetch()) {
      echo    "<br>";
      echo    "<div  style='border: solid;'>";
      echo     "Adresse de livraison:";
      echo    "<br>";
      echo    "Numéro d'adresse : " . $row['aid'];
      echo    "<br>";
      echo    "Code Postal : " . $row['aacp'];
      echo    "<br>";
      echo    "Ville : " . $row['aville'];
      echo    "<br>";
      echo    "Rue : " . $row['arue'];
      echo    "<br>";
      echo    "Numéro : " . $row['anum'];
      echo    "<br>";
      echo    "</div>";
    }
  } else {
    echo "<br>";
    echo "Impossible de trouver l'adresse de livraison";
  }

// On affiche l'adresse de facturation
  $results3 = $DB->select("SELECT adresse.id AS bid, adresse.code_postal AS bbcp, adresse.ville AS bville, adresse.rue AS brue, adresse.numero AS bnum
FROM adresse
INNER JOIN commande ON adresse.id = commande.facturation
WHERE commande.id = $id_commande
LIMIT 1");
  if ($results3->rowCount() > 0) {
    while ($row = $results3->fetch()) {
      echo    "<br>";
      echo    "<div  style='border: solid;'>";
      echo     "Adresse de facturation:";
      echo    "<br>";
      echo    "Numéro d'adresse : " . $row['bid'];
      echo    "<br>";
      echo    "Code Postal : " . $row['bbcp'];
      echo    "<br>";
      echo    "Ville : " . $row['bville'];
      echo    "<br>";
      echo    "Rue : " . $row['brue'];
      echo    "<br>";
      echo    "Numéro : " . $row['bnum'];
      echo    "<br>";
      echo    "</div>";
    }
  } else {
    echo "<br>";
    echo "Impossible de trouver l'adresse de facturation";
  }
}
