<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO
// On recherche toutes les commandes
$results = $DB->select("SELECT commande.client_id AS auteur, commande.id as ID, velo.nom as NOM, velo.description as DESCRIPTION, adresse.code_postal as CP, adresse.ville as VILLE, adresse.rue as RUE, adresse.numero as NUM
FROM commande
INNER JOIN velo ON commande.velo_id = velo.id
INNER JOIN adresse ON commande.livraison = adresse.id
ORDER BY commande.id DESC");
if ($results->rowCount() > 0) { // Si il ya des commandes
    while ($row = $results->fetch()) { // On les affiche
        echo    "<div id='historique' style='border: solid;'>";
        echo    "Numéro commande : " . $row['ID'];
        echo    "<br>";
        echo    "Client N°" . $row['auteur'];
        echo    "<br>";
        echo    "Vélo : " . $row['NOM'];
        echo    "<br>";
        echo    "Description : " . $row['DESCRIPTION'];
        echo    "<br>";
        echo    "Adresse de livraison : ";
        echo    "<br>";
        echo    "Code Postal : " . $row['CP'];
        echo    "<br>";
        echo    "Ville : " . $row['VILLE'];
        echo    "<br>";
        echo    "Rue : " . $row['RUE'];
        echo    "<br>";
        echo    "Numéro : " . $row['NUM'];
        echo    "</div>";
    }
} else {
    echo "Aucune commande n'a été trouvée";
}
