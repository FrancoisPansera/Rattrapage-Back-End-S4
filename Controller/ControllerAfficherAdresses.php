<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

if (isset($_SESSION['admin']) == 1) { //On vérifie que l'utilisateur est admin
    $client_id = $_SESSION['Client'];
    $results = $DB->select("SELECT id, code_postal, ville, rue, numero, client_id
    FROM adresse
    WHERE client_id = $client_id
    ORDER BY id DESC");
    if ($results->rowCount() > 0) { // Si il y a des résultats
        while ($row = $results->fetch()) { // Récupération des résultats
            echo    "<br>"; // Mise en forme des résultats
            echo    "<div  style='border: solid;'>";
            if (isset($_GET['Livraison'])) {
                $livraison = $_GET['Livraison'];
                echo    "<a href='Commande3.php?Livraison=" . $livraison . "&Facturation=" . $row['id'] . "&Id_Velo=" . $_GET['Id_Velo'] . "'>Choisir</a>";
            } else {
                echo "<a href='Commande2.php?Livraison=" . $row['id'] . "&Id_Velo=" . $_GET['Id_Velo'] . "'>Choisir</a>";
            }
            echo    "<br>";
            echo    "Ville : " . $row['ville'];
            echo    "<br>";
            echo    "Code Postal : " . $row['code_postal'];
            echo    "<br>";
            echo    "Rue : " . $row['rue'];
            echo    "<br>";
            echo    "Numéro : " . $row['numero'];
            echo    "<br>";
            echo    "</div>";
        }
    } else {
        echo "Vous n'avez pas encore renseigné d'adresses"; // Si il n'y a pas de résultats
    }
} else {
    header("Location:../Accueil.php"); // Si l'utilisateur n'est pas administrateur
    die(); // Fin du processus en cours
}
