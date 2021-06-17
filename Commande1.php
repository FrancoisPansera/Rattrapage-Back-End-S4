<!DOCTYPE html>
<html>

<head>
    <title>Commande: Livraison</title>
</head>

<body>
    <header>
        <?php
        require('NavBar.php');
        ?>
    </header>

    <main>
        <h1>Résumé du vélo</h1>  
        <input id="id_velo" type="hidden" value="<?php echo htmlentities($_GET['Id_Velo']); ?>"><!-- Input invisible, permettant de récupérer l'ID du vélo par GET, cet input sera appelé pour l'affichage des adresses -->
        <div id="InfoVelo"></div> <!-- Emplacement du résumé du vélo -->
        <h1>Choisir une adresse de livraison</h1>
        <button onclick="location.href='AjoutAdresse.php?Id_Velo=<?php echo $_GET['Id_Velo'] ?>'">Ajouter une adresse</button> <!-- Lien vers l'ajout d'adresse -->
        <div id="ListeAdresses"></div> <!-- Emplacement de la liste des adresses du client -->
    </main>

    <script src="./assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#InfoVelo").load("Controller/ControllerVeloInfo.php", { // Appel du controlleur d'informations de vélo, les réultats seront affiché dans "InfoVelo"
                Id_Velo: $("#id_velo").val(), // On récupère la valeur de l'input invisible "id_velo" pour la transmettre au controlleur par POST

            });
        });
        $(document).ready(function() {
            $("#ListeAdresses").load("Controller/ControllerAfficherAdresses.php?Id_Velo=<?php echo $_GET['Id_Velo'] ?>", { // Appel du controlleur de listage des adresses du client, les réultats seront affiché dans "ListeAdresse". De plus, on transmet l'id du vélo  par GET

            });
        });
    </script>
</body>

</html>