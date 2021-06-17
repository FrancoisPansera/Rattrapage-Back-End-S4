<!DOCTYPE html>
<html>

<head>
   <title>Accueil</title>
</head>

<body>
   <header>
      <?php
      require('NavBar.php');
      ?>
   </header>
   <h1>Trouver un profil</h1> 
   <form id="Formulaire" method="GET" action="./TrouverClient.php"> <!-- Formulaire envoyant les paramètres de recherche (si il y en a) par GET -->
      <div>
         <div>
            <label for="nom">Nom :</label>
            <input type="text" name="Nom" id="nom" placeholder="Nom">
         </div>
         <div>
            <label for="prenom">Prénom :</label>
            <input type="text" name="Prenom" id="prenom" placeholder="Prénom">
         </div>
      </div>

      </div>

      <button type="submit">Valider</button> <!-- Aucun champ n'est requis -->
   </form>
   <div id="ListeClients"></div> <!-- Emplacement de la liste des clients -->
   <script src="./assets./vendors./jquery/jquery-3.5.1.min.js"></script>
   <script>
      $(document).ready(function() {
         $("#ListeClients").load("Controller/ControllerTrouverCompte.php?Nom=<?php echo $_GET['Nom'] ?>&Prenom=<?php echo $_GET['Prenom'] ?>", { // Appel du controlleur de recherche de compte, on envoie le nom et le prénom par GET

         });
      });
   </script>
</body>

</html>