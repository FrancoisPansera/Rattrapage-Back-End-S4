<!DOCTYPE html>
<html>

<head>
    <title>Résumé de la commande</title>
</head>

<body>
    <header>
        <?php
        require('NavBar.php');
        ?>
    </header>

    <main>
        <h1>Résumé de la commande</h1> <!-- Pour le récapitulatif de la commande, le principe est le même pour le résumé du vélo, de l'adresse de livraison et de facturation -->
        <label for="id_velo">Résumé du vélo :</label>  <!-- Titre du résumé du vélo -->
        <input id="id_velo" type="hidden" value="<?php echo htmlentities($_GET['Id_Velo']); ?>"> <!-- Récupération de l'ID du vélo par GET -->
        <div id="InfoVelo"></div> <!-- Emplacement de l'affichage du résumé du vélo -->
        <label for="liv">Adresse de livraison :</label>
        <input id="liv" type="hidden" value="<?php echo htmlentities($_GET['Livraison']); ?>">
        <div id="AdresseLivraison"></div>
        <br> <!-- Je trouvais plus esthétique de sauter une ligne à cet endroit -->
        <label for="fac">Adresse de facturation :</label>
        <input id="fac" type="hidden" value="<?php echo htmlentities($_GET['Facturation']); ?>">
        <div id="AdresseFacturation"></div>
    </main>
    <form method="POST" action="./Controller/ControllerValiderCommande.php"> <!-- Validation de la commande, on transmet les informations par POST. à noter qu'aucun formulaire visible n'est présent étant donné qu'on ne fait que récupérer les valeurs précédemment entrées lors de la commande -->
        <input id="id_velo" name="Id_Velo" type="hidden" value="<?php echo htmlentities($_GET['Id_Velo']); ?>">
        <input id="livraison" name="Livraison" type="hidden" value="<?php echo htmlentities($_GET['Livraison']); ?>">
        <input id="facturation" name="Facturation" type="hidden" value="<?php echo htmlentities($_GET['Facturation']); ?>">
        <button type="submit">Valider la commande</button> <!-- Bouton de validation -->
    </form>
    <script src="./assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#InfoVelo").load("Controller/ControllerVeloInfo.php", { // Appel du controller d'information du vélo, on transmet l'ID du vélo par POST
                Id_Velo: $("#id_velo").val(),

            });
        });
        $(document).ready(function() {
            $("#AdresseLivraison").load("Controller/ControllerResumeLiv.php", { // Appel du controller de résumé d'adresse de livraison, on transmet l'ID de l'adresse par POST
                Livraison: $("#liv").val(),

            });
        });
        $(document).ready(function() {
            $("#AdresseFacturation").load("Controller/ControllerResumeFac.php", { // Appel du controller de résumé d'adresse de facturation, on transmet l'ID de l'adresse par POST
                Facturation: $("#fac").val(),

            });
        });
    </script>
</body>

</html>