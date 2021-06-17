<nav>
  <div>
    <a href="Accueil.php">Accueil </a>

    <a href="Profil.php">Mon Profil </a>

    <a href="Deconnexion.php">Deconnexion </a>

    <?php if ($_SESSION['admin'] == 1) {
      echo "<a href='TrouverClient.php'>Gestion des clients </a>";
      echo "<a href='TrouverCommande.php'>Gestion des commandes</a>";
    } else {
    } ?>
  </div>
</nav>