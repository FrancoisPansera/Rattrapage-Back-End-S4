<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

$id_velo = $_POST['Id_Velo'];
$results = $DB->select("SELECT id, nom, description, stock
FROM velo
WHERE id = $id_velo");
if ($results->rowCount() > 0) {
    while ($row = $results->fetch()) {
        echo "<p>";
        echo "Nom : " . $row['nom'];
        echo "<br>";
        echo "Description : " . $row['description'];
        echo "<br>";
        echo "Stock: " . $row['stock'];
        echo "</p>";
    }
} else {
    echo "Erreur, ce vélo n'existe pas";
}
