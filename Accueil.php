<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
</head>

<body>
    <header>
        <?php
        require('NavBar.php'); // Import de la barre de navigation
        ?>
    </header>

    <div id="ListeVelos"></div> <!-- Emplacement de l'afffichage des vélos -->

    <script src="./assets./vendors./jquery/jquery-3.5.1.min.js"></script> <!-- Import de Jquery -->
    <script>
        $(document).ready(function() {
            $("#ListeVelos").load("Controller/ControllerAfficherVelos.php", {}); //Appel du controller d'affichage des vélos, le résultat se trouvera dans "ListeVelo"
        });
    </script>
</body>
</html>