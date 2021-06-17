<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

$id_velo = $_GET['Id_Velo']; // Récupération des données
$id_com = $_GET['Id_Commentaire'];
if (isset($_SESSION['Client'])) { // Vérification que le client est connecté
    $id_client = $_SESSION['Client']; // Récupération de l'ID du client
    $results = $DB->select("SELECT id, client_id, commentaire_id
    FROM aime
    WHERE client_id = $id_client AND commentaire_id = $id_com");

    if ($results->rowCount() > 0) { // Si il y a des résultats
        while ($row = $results->fetch()) { 
            header("Location:../PageVelo.php?Id_Velo=" . $id_velo); // On redirige, on ne peut pas liker 2 fois
            die();
        }
    } else { // Si il n'y en a pas
        $DB->insert( // On ajoute un like
            "INSERT INTO `aime` (`id`, `client_id`, `commentaire_id`) 
        VALUES (NULL, '$id_client', '$id_com')"
        );
    }
} else {
    header("Location:../PageVelo.php?Id_Velo=" . $id_velo);
    die();
}

header("Location:../PageVelo.php?Id_Velo=" . $id_velo);
die();
