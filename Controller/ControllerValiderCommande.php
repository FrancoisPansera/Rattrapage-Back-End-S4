<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

if (isset($_SESSION['Client']) && isset($_POST['Id_Velo']) && isset($_POST['Livraison']) && isset($_POST['Facturation'])) { // On vérifie que toutes nos valeurs existent
    $id_client  = $_SESSION['Client']; // Récupération des données
    $id_velo  = $_POST['Id_Velo'];
    $livraison  = $_POST['Livraison'];
    $facturation  = $_POST['Facturation'];

    $DB->insert(
        "INSERT INTO `commande` (`id`, `client_id`, `velo_id`, `livraison`, `facturation`) 
        VALUES (NULL, '$id_client', '$id_velo', '$livraison', '$facturation')"
    ); // On crée la nuvelle commande

    $results = $DB->select("SELECT stock
    FROM velo
    WHERE id = $id_velo
    LIMIT 1"); // On récupère le stock du vélo
    if ($results->rowCount() > 0) {
        while ($row = $results->fetch()) { // Et on décrémente le stock
            $stock = $row['stock'] - 1;
            $DB->delete(
                "UPDATE velo
            SET stock = '$stock'
            WHERE id = $id_velo;"
            );
        }
    } else {
        header("Location:../ResultatCommande.php?reussite=0");
        die();
    }
} else {
    header("Location:../ResultatCommande.php?reussite=0");
    die();
}
header("Location:../ResultatCommande.php?reussite=1");
die();
