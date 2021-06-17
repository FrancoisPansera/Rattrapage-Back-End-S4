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
    <h1>Liste des commande</h1>
    <p>Modifier une commande</p>
    <form id="Formulaire" method="GET" action="./ModificationCommande.php"> <!-- Formulaire envoyant le numéro de commande à la page de modification de commande, par GET -->
        <div>
            <div>
                <label for="commande">Numéro de commande :</label>
                <input type="number" name="Commande" id="commande" placeholder="Numéro de commande" required>
            </div>
        </div>

        <button type="submit">Valider</button> <!-- Champ de commande requis, pour éviter les erreurs -->
    </form>
    <div id="ListeCommandes"></div> <!-- Emplacement d'affichage de la liste des commandes -->
    <script src="./assets./vendors./jquery/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#ListeCommandes").load("Controller/ControllerTrouverCommande.php", { // Appel du controlleur de recherche de commande

            });
        });
    </script>
</body>

</html>