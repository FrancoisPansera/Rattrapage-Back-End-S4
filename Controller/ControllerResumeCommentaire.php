<?php
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

if (isset($_GET['Id_Commentaire'])) { // Si un id commentaire a été envoyé
    $commentaire = $_GET['Id_Commentaire']; // Récupération des données
    $results = $DB->select("SELECT commentaire
FROM commentaire
WHERE id = $commentaire");
    if ($results->rowCount() > 0) {
        while ($row = $results->fetch()) {
            echo    "<div  style='border: solid;'>";
            echo    $row['commentaire'];
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
