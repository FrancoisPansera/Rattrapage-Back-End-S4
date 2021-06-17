<?php
session_start(); // On démarre ou repend la session
if (isset($_POST['username']) && isset($_POST['password'])) { // On vérifie les données transmises
    require "./Model/ModeleDB.php"; // On inclut le modèle 
    $DB = new DB(); // On initialise un objet PDO
    $user = $_POST['username']; // Récupération des données
    $mdp = $_POST['password'];

    if ($user !== "" && $mdp !== "") { // Si le user ou mot de passe n'est pas vide 
        $results = $DB->select("SELECT password, client_id, admin FROM connexion where username = '$user'"); // On récupère les informations du compte
        $row = $results->fetch();
        $motdepasse = $row['password'];
        $id_client = $row['client_id'];
        $admin = $row['admin'];

        if ($motdepasse === $mdp) { // On vérifie le mot de passe
            $_SESSION['username'] = $user;
            $_SESSION['id_client'] = $id_client;
            $_SESSION['admin'] = $admin;

            header('Location: ../Deconnexion.php');
        } else {
            header('Location: ../Connexion.php?erreur=1');
        }
    } else {
        header('Location: ../Connexion.php?erreur=2');
    }
} else {
    header('Location: Connexion.php');
};
