<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

if (isset($_POST['Facturation'])) { // Si un id d'adresse a été envoyé
    $id_client = $_SESSION['Client']; // Récupération des données
    $facturation = $_POST['Facturation'];
    $results = $DB->select("SELECT id, code_postal, ville, rue, numero, client_id
    FROM adresse
    WHERE client_id = $id_client AND id = $facturation");
    if ($results->rowCount() > 0) { // Si il y a un résultat
        while ($row = $results->fetch()) { // Récupération et mise en forme des données
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
