<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

$id_velo = $_GET['Id_Velo']; // Récupération de l'ID du vélo
if (isset($_SESSION['Client'])) { // Si le client est connecté
    $cp = $_POST['cp']; // Récupération des données en POST
    $ville = $_POST['ville'];
    $rue = $_POST['rue'];
    $numero = $_POST['numero'];
    $id_client = $_SESSION['Client']; // Récupération de l'ID du client

    $DB->insert(
        "INSERT INTO `adresse` (`id`, `code_postal`, `ville`, `rue`, `numero`, `client_id`) 
        VALUES (NULL, '$cp', '$ville', '$rue', '$numero', '$id_client')"
    );
} else { // Si il n'est pas connecté
    header("Location:../PageVelo.php?Id_Velo=" . $id_velo);
    die();
} // Redirection
header("Location:../Commande1.php?Id_Velo=" . $id_velo);
die();
