<!DOCTYPE html>
<html>

<head>
   <title>Inscription</title>
</head>

<body>
   <header>
      <?php
      require('NavBar.php');
      ?>
   </header>
   <main>
      <h1>Inscription</h1>
      <form name="fo" method="post" action="./Controller/Controllerinscription.php"> <!-- Formulaire d'inscription, toutes les données sont "required", donc aucun champ vide n'est possible. Une fois validé, il enverra les informations par POST au controller d'inscription -->
         <div>
            <div>
               <label for="nom">Nom :</label>
               <input type="text" name="nom" id="nom" placeholder="Nom" required>
            </div>
            <div>
               <label for="prenom">Prenom :</label>
               <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
            </div>
         </div>
         <div>
            <div>
               <label for="identifiant">Identifiant :</label>
               <input type="text" name="identifiant" id="identifiant" placeholder="identifiant" required>
            </div>
         </div>
         <div>
            <div>
               <label for="motdepasse">Mot de passe :</label>
               <input type="password" name="motdepasse" id="motdepasse" placeholder="Mot de passe" required>
            </div>
         </div>
         <button type="submit">S'inscrire</button>
      </form>
   </main>
</body>
</main>

</html>