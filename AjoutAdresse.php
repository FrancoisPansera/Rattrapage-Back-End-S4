<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://vicopo.selfbuild.fr/vicopo.js"></script> <!-- Import de l'API "Vicopo" -->
<html>

<head>
   <title>Ajout d'une adresse</title>
</head>

<body>
   <header>
      <?php
      require('NavBar.php');
      ?>
   </header>
   <main>


      <h1>Ajout d'une nouvelle adresse</h1>
      <form id="Formulaire" method="post" action="./Controller/ControllerAjouterAdresse.php?Id_Velo=<?php echo $_GET['Id_Velo'] ?>"> <!-- Formulaire appelant le controller d'ajout adresse en transmettant les données par POST, il envoie également l'ID du vélo par GET -->
         <div>
            <div>
               <label for="cp">Code Postal :</label> 
               <input type="number" name="cp" id="cp" required> <!-- Code postal -->
            </div>
            <div>
               <label for="ville">Ville :</label>
               <input type="text" name="ville" id="ville" required> <!-- Ville -->
            </div>
         </div>
         <ul>
            <li data-vicopo="#cp" data-vicopo-click='{"#cp": "code", "#ville": "ville"}' data-vicopo-get="code"> <!-- Appel de Vicopo, une api permettant l'autocomplétion de la combinaison ville/code postal -->
               <strong data-vicopo-code-postal></strong>
               <span data-vicopo-ville></span>
            </li>  <!-- Concernant cette partie, je me suis basé sur les exemples fournis sur le site web de vicopo, en modifiant les paramètres pour que seul le code postal complète la ville, et pas inversement -->
         </ul>
         <div>
            <div>
               <label for="rue">Rue :</label> 
               <input type="text" name="rue" required> <!-- Rue -->
            </div>
         </div>
         <div>
            <div>
               <label for="numero">Numero :</label>
               <input type="number" name="numero" required> <!-- Numéro -->
            </div>
         </div>

         <button type="submit">Valider l'adresse</button> <!-- Bouton de validation, à noter que tous les champs ont l'attribut "required", pour s'assurer qu'aucun champ n'est vide lors de l'envoi des données -->
      </form>
   </main>
</body>
</main>

</html>