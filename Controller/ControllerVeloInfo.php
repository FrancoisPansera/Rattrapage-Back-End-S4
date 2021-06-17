<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

$id_velo = $_POST['Id_Velo']; // Récupération des données
$results = $DB->select("SELECT velo.id, nom, description, stock, ROUND(AVG(note.note) ,1) as moynote
FROM velo
LEFT JOIN note ON velo.id = note.velo_id
WHERE velo.id = $id_velo
GROUP BY velo.id
ORDER BY velo.id"); // Requête des données du vélo
if ($results->rowCount() > 0) { // Si il y a un vélo trouvé
    while ($row = $results->fetch()) { // On récupère les données et on les affiches
        echo "<p>";
        echo "Nom : " . $row['nom'];
        echo "<br>";
        echo "Description : " . $row['description'];
        echo "<br>";
        echo "Stock : " . $row['stock'];
        echo "<br>";
        echo "Note : " . $row['moynote'] . "/5";
        echo "</p>";
    }
} else {
    echo "Erreur, ce vélo n'existe pas";
}
