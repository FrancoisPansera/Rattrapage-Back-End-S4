<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

$id_velo = $_POST['id_velo'];
$note = $_POST['note'];
if (isset($_SESSION['Client'])) { // On vérifie que le client est connecté
    $id_client = $_SESSION['Client'];
    $results = $DB->select("SELECT id, client_id, velo_id
    FROM note
    WHERE client_id = $id_client AND velo_id = $id_velo");

    if ($results->rowCount() > 0) { // Si il a un résultat
        $result = $DB->delete( // On met à jour la note
            "UPDATE note
    SET note = '$note'
    WHERE client_id = $id_client AND velo_id = $id_velo;"
        );
    } else {
        $DB->insert( // Sinon on en ajoute une
            "INSERT INTO `note` (`id`, `client_id`, `velo_id`, `note`) 
        VALUES (NULL, '$id_client', '$id_velo', '$note')"
        );
    }
} else {
    header("Location:../PageVelo.php?Id_Velo=" . $id_velo);
    die();
}

header("Location:../PageVelo.php?Id_Velo=" . $id_velo);
die();
