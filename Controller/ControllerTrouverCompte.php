<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

if (isset($_SESSION['admin']) == 1) { // On vérifie que l'utilisateur est administrateur
    if (isset($_GET['Nom'])) { // on vérifie les champs
        $nom = $_GET['Nom']; // Si ils sont renseignés, on récupère leur valeur
    } else {
        $nom = ''; // Sinon on laisse une chaîne de caractères vide
    }
    if (isset($_GET['Prenom'])) {
        $prenom = $_GET['Prenom'];
    } else {
        $prenom = '';
    }

    $results = $DB->select("SELECT id, nom, prenom
FROM client
WHERE nom LIKE '%$nom%' AND prenom LIKE '%$prenom%'
ORDER BY nom");
    if ($results->rowCount() > 0) {
        while ($row = $results->fetch()) {
            echo    "<br>";
            echo    "<div  style='border: solid;'>";
            echo    "<br>";
            echo    "Nom : " . $row['nom'];
            echo    "<br>";
            echo    "Prénom : " . $row['prenom'];
            echo    "<br>";
            echo    "<a href='./ApercuProfil.php?Id_Client=" . $row['id'] . "'>Afficher</a>";
            echo   "<br>";
            echo    "</div>";
        }
    } else {
        echo "Aucun compte n'a été trouvé";
    }
} else {
}
