<!DOCTYPE html>
<html>

<head>
    <title>Profil</title>
</head>

<body>
    <header>
        <?php
        require('NavBar.php');
        ?>
    </header>
    <main>
        <section id="Profil">
            <h1>Profil :</h1>
            <div>
                <div id="InfoClient"></div> <!-- Emplacement d'informations du client -->
                <a type="button" href="ModificationCompte.php">Modifier les informations</a> <!-- Lien vers la page de modification de compte -->
                <h2>Historique de vos commandes:</h2>
                <div id="historiquecommandes"></div> <!-- Emplacement de l'historique -->
            </div>
        </section>
    </main>
    <script src="./assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#InfoClient").load("Controller/ControllerClientInfo.php", { // Appel du controller d'informations client

            });
        });
        $(document).ready(function() {

            $("#historiquecommandes").load("Controller/ControllerHistorique.php", { // Appel du controlleur d'historique

            });
        });
    </script>
</body>

</html>