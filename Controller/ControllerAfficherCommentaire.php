<?php
session_start(); // On reprend la session
require "./Model/ModeleDB.php"; // On importe le ModeleDB, qui sert pour les requêtes préparées
$DB = new DB(); // On initialise un objet PDO

$privilege = 2; // Valeur par défaut, qui ne procure aucun avantage
$id_velo = $_POST['Id_Velo'];
$verif = isset($_SESSION['admin']); // On vérifie que l'utilisateur est connecté
if ($verif == 1) {
    $privilege = $_SESSION['admin']; // On indique si l'utilisateur est admin
} else {
}
$results = $DB->select("SELECT commentaire.id AS comid, commentaire.client_id as idauteur, connexion.username AS auteur, commentaire.commentaire AS comment, COUNT(aime.id) as numlike
FROM commentaire
LEFT JOIN aime ON aime.commentaire_id = commentaire.id
INNER JOIN connexion on connexion.client_id = commentaire.client_id
WHERE commentaire.velo_id = $id_velo
GROUP BY commentaire.id
ORDER BY numlike DESC");

if ($results->rowCount() > 0) { // Si il y a un résultat
    while ($row = $results->fetch()) { // Récupération des résultats
        echo    "<br>"; // Mise en forme des résultats
        echo    "<div  style='border: solid;'>";
        echo    $row['comment'];
        echo    "<br>";
        echo    "De : " . $row['auteur'];
        echo    "<br>";
        echo    "Likes : " . $row['numlike'];
        if ($verif == 1) { // Si il est connecté
            echo    "<a href='Controller/ControllerAjouterLike.php?Id_Commentaire=" . $row['comid'] . "&Id_Velo=" . $id_velo . "'>+</a>"; //Lien vers l'ajout de like
        } else {
        }
        echo    "<br>";
        if ($_SESSION['Client'] == $row['idauteur']) { // Si l'utilisateur est l'auteur du commentaire
            echo    "<a href='ModificationCommentaire.php?Id_Commentaire=" . $row['comid'] . "'>Modifier</a>"; // Lien vers la modification de commentaire
        } else {
        }
        if ($privilege == 1) { // Si il est administrateur
            echo    "<a href='Controller/ControllerSupprimerCommentaire.php?Id_Commentaire=" . $row['comid'] . "'>Supprimer</a>"; // Lien vers la suppression de charactères
        } else {
        }
        echo    "</div>";
    }
} else { // Si il n'y a pas de résultats
    echo "Il n'y a aucun commentaire pour l'instant";
}


