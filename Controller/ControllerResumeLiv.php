<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

if (isset($_POST['Livraison'])) { // On regarde si une ID a été envoyé
    $id_client = $_SESSION['Client']; // Récupération des données
    $livraison = $_POST['Livraison'];
    $results = $DB->select("SELECT id, code_postal, ville, rue, numero, client_id
    FROM adresse
    WHERE client_id = $id_client AND id = $livraison");
    if ($results->rowCount() > 0) {
        while ($row = $results->fetch()) {
            echo    "<br>";
            echo    "<div  style='border: solid;'>";
            echo    "Ville : " . $row['ville'];
            echo    "<br>";
            echo    "Code Postal : " . $row['code_postal'];
            echo    "<br>";
            echo    "Rue : " . $row['rue'];
            echo    "<br>";
            echo    "Numéro : " . $row['numero'];
            echo    "<br>";
            echo    "</div>";
        }
    } else {
        echo "Erreur de traitement";
    }
} else {
    header("Location:../Accueil.php");
    die();
}
