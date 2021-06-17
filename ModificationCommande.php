<!DOCTYPE html>
<html>

<head>
   <title>Modification d'une commande</title>
</head>

<body>
   <header>
      <?php
      require('NavBar.php');
      ?>
   </header>

   <main>
      <h1>Modifier une commande</h1>
      <div id="ResumeCommande"></div> <!-- Emplacement du résumé de la commande à modifier -->
      <form method="POST" action="./Controller/ControllerModifierCommande.php"> <!-- Formulaire envoyant les données au controlleur de modification de commande par POST -->
         <div>
            <input id="id_commande" name="id_commande" type="hidden" value="<?php echo htmlentities($_GET['Commande']); ?>"> <!-- Champ vide utilisé pour récupérer l'id de la commande et la transmettre au formulaire -->
            <div>
               <label for="clientid">Numéro client :</label>
               <input type="number" name="clientid" placeholder="Numéro Client" required>
            </div>
            <div>
               <label for="veloid">Numéro vélo :</label>
               <input type="number" name="veloid" placeholder="Numéro Vélo" required>
            </div>
            <div>
               <label for="livid">Numéro d'adresse de livraison :</label>
               <input type="number" name="livid" placeholder="Adresse de livraison" required>
            </div>
            <div>
               <label for="facid">Numéro d'adresse de facturation :</label>
               <input type="number" name="facid" placeholder="Adresse de facturation" required>
            </div>
         </div>

         </div>

         <button type="submit">Valider</button>
      </form>
      <form action="./Controller/ControllerSupprimerCommande.php" method="POST"> <!-- Formulaire appellant le controller de suppression de commande en transmettant l'id de la commande par POST -->
         <input id="id_commande" name="id_commande" type="hidden" value="<?php echo htmlentities($_GET['Commande']); ?>"> <!-- input invisible permettant de récupérer l'id de la commande par GET, pour la transmettre au formulaire -->
         <button type="submit">Supprimer la commande</button>
      </form>
   </main>

   <script src="./assets/vendors/jquery/jquery-3.5.1.min.js"></script>
   <script>
      $(document).ready(function() {

         $("#ResumeCommande").load("Controller/ControllerCommandeInfo.php?Commande=<?php echo $_GET['Commande'] ?>", { // Appel du résumé de la commande en transmettant l'id de la commande par GET, et affichant le résulat dans "ResumeCommande"

         });
      });
   </script>
</body>

</html>