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
        <section>
            <h1>Profil de :</h1>
            <div>
                <div id="InfoClient"> </div> <!-- Emplacement de l'affichage des informations du client -->
                    <a type="button" href="ModificationAutreCompte.php?Id_Client=<?php echo $_GET['Id_Client'] ?>" type="button">Modifier les informations</a> <!-- Lien vers la modification d'un autre compte -->

                <div id="historique" style="border: solid;"> <!-- Emplacement de l'historique -->
                    <h2>Historique des commandes:</h2>
                    <div id="historiquecommandes"></div>  <!-- Emplacement de chaque commande passée -->
                </div>
            </div>
        </section>
    </main>


    <script src="./assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#InfoClient").load("Controller/ControllerClientInfo.php?Id_Client=<?php echo $_GET['Id_Client'] ?>", { // Appel du controller de résumé des informations du client, en récupérant l'ID du client par GET, et en le renvoyant de la même façon au controlleur. Le résultat sera affiché dans "InfoClient"

            });
        });
        $(document).ready(function() {

            $("#historiquecommandes").load("Controller/ControllerHistorique.php?Id_Client=<?php echo $_GET['Id_Client'] ?>", { // Même opération que pour le résumé des informations du client, à la différence qu'on appelle le contrôlleur d'historique de commande, le résultat sera affiché dans "historiquecommandes"

            });
        });
    </script>
</body>

</html>