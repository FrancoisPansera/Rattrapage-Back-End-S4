<!DOCTYPE html>
<html>

<head>
    <title>Commande: Facturation</title>
</head>

<body>
    <header>
        <?php
        require('NavBar.php');
        ?>
    </header>

    <main>
        <h1>Résumé du vélo</h1>
        <input id="id_velo" type="hidden" value="<?php echo htmlentities($_GET['Id_Velo']); ?>"> <!-- Input invisible, permettant de récupérer l'ID du vélo par GET, cet input sera appelé pour l'affichage des adresses -->
        <div id="InfoVelo"></div> <!-- Emplacement des informations du vélo -->
        <h1>Choisir une adresse de facturation</h1>
        <div id="ListeAdresses"></div> <!-- Emplacement des adresses du client -->
    </main>

    <script src="./assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#InfoVelo").load("Controller/ControllerVeloInfo.php", { // Appel du controlleur d'informations de vélo, les réultats seront affiché dans "InfoVelo"
                Id_Velo: $("#id_velo").val(), // On récupère la valeur de l'input invisible "id_velo" pour la transmettre au controlleur par POST

            });
        });
        $(document).ready(function() {
            $("#ListeAdresses").load("Controller/ControllerAfficherAdresses.php?Id_Velo=<?php echo $_GET['Id_Velo'] ?>&Livraison=<?php echo $_GET['Livraison'] ?>", { // Appel du controlleur de listage des adresses du client, les réultats seront affiché dans "ListeAdresse". De plus, on transmet l'id du vélo ainsi que l'adresse de livraison précédemment sélectionnée par GET

            });
        });
    </script>
</body>

</html>