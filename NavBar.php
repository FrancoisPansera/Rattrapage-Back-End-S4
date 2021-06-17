<?php
session_start(); // On reprend la session
if (isset($_SESSION['admin']) && $_SESSION['admin'] !== "") { // Si $_SESSION['admin'] est défini est non null, on charge la navbar d'utilisateur connecté
  $user = $_SESSION['username']; 

  echo "Connecté en tant que : $user"; // On affiche un message
  require('./navbar/NavbarConnected.php'); // On charge la navbar d'utilisateur connecté
} else { // Si il est déconnecté, on charge la navbar d'utilisateur déconnecté

  require('./navbar/NavbarDisconnected.php');
}
