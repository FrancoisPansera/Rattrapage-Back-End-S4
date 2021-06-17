<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

$privilege = 0; // Valeur par défaut
if (isset($_SESSION['admin']) == 1) { // Si l'utilisateur est connecté
    $privilege = $_SESSION['admin']; // On indique si il est administrateur
} else {
}
$results = $DB->select("SELECT velo.id, nom, description, stock, ROUND(AVG(note.note) ,1) as moynote
FROM velo
LEFT JOIN note ON velo.id = note.velo_id
WHERE stock > 0
GROUP BY velo.id
ORDER BY velo.id");

if ($results->rowCount() > 0) { // Si il y a des résultats
    while ($row = $results->fetch()) { // Récupération des résultats
        echo    "<br>"; // Mise en forme des résultats
        echo    "<div  style='border: solid;'>";
        echo    "<a href='PageVelo.php?Id_Velo=" . $row['id'] . "'>" . $row['nom'] . "</a>"; // Lien vers la page du vélo
        echo    "<br>";
        echo    "Description : " . $row['description'];
        echo    "<br>";
        echo    "Stock : " . $row['stock'];
        echo    "<br>";
        echo    "Note : " . $row['moynote'] . "/5";
        if ($privilege == 1) {
            echo    "<br>";
            echo    "<a href='ModificationVelo.php?Id_Velo=" . $row['id'] . "'>Modifier </a>"; // Lien vers la page de modification du vélo
        } else {
        }
        echo    "</div>";
    }
} else {
    echo "Il n'y a plus de vélos, désolé";
}
