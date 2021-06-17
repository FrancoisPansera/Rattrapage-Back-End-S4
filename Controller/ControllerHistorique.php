<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

if (isset($_GET['Id_Client']) && $_SESSION['admin'] == 1) { // Si on a envoyé un id client est que l'utilisateur est administrateur
    $client_id = $_GET['Id_Client']; // On récupère l'id du GET
} else {
    $client_id = $_SESSION['Client']; // On récupère l'id de session
}
//On récupère les résultats
$results = $DB->select("SELECT commande.id as ID, velo.nom as NOM, velo.description as DESCRIPTION, adresse.code_postal as CP, adresse.ville as VILLE, adresse.rue as RUE, adresse.numero as NUM
FROM commande
INNER JOIN velo ON commande.velo_id = velo.id
INNER JOIN adresse ON commande.livraison = adresse.id
WHERE commande.client_id = $client_id
ORDER BY commande.id DESC");
if ($results->rowCount() > 0) {
    while ($row = $results->fetch()) {
        echo    "<div id='historique' style='border: solid;'>";
        echo    "Numéro commande : " . $row['ID'];
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
    echo "Votre historique est vide";
}
