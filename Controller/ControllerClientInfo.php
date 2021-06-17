<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

if (isset($_GET['Id_Client']) && $_SESSION['admin'] == 1) { // Si on a envoyé un ID client et que l'utilisateur est administrateur
    $client_id = $_GET['Id_Client']; // On prend l'ID transférée
} else {
    $client_id = $_SESSION['Client']; // On prend l'ID de session
}
$results = $DB->select("SELECT id, nom, prenom
FROM client
WHERE id = $client_id");
if ($results->rowCount() > 0) {
    while ($row = $results->fetch()) {
        echo "<p>";
        echo "Nom: " . $row['nom'];
        echo "<br>";
        echo "Prénom: " . $row['prenom'];
        echo "</p>";
    }
} else {
    echo "Erreur, vous n'existez pas";
}
