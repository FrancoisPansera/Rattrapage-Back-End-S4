<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

$redir = 0;
if (isset($_GET['Id_Client']) && $_SESSION['admin'] == 1) { // On regarde si un id a été envoyé et si l'utilisateur est administrateur
    $client_id = $_GET['Id_Client'];
    $redir = 1;
} else {
    $client_id = $_SESSION['Client'];
}
$result = $DB->delete( // On supprime
    "DELETE FROM aime WHERE client_id = $client_id;
    DELETE FROM note WHERE client_id = $client_id;
    DELETE FROM adresse WHERE client_id = $client_id;
    DELETE FROM connexion WHERE client_id = $client_id;
    DELETE FROM commentaire WHERE client_id = $client_id;
    DELETE FROM commande WHERE client_id = $client_id;
    DELETE FROM client WHERE id = $client_id;"
);

if ($redir == 0) {
    header("Location:../Deconnexion.php?deconnexion=true");
    die();
} else {
    header("Location:../Accueil.php");
    die();
}
