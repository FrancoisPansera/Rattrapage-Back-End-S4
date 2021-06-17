<!DOCTYPE html>
<html>

<head>
    <title>Modification du compte</title>
</head>

<body>
    <header>
        <?php
        require('NavBar.php');
        ?>
    </header>

    <main>
        <h1>Modifier votre profil</h1>
        <div id="ResumeProfil"></div> <!-- Emplacement de résumé du profil -->
        <form method="POST" action="./Controller/ControllerModifierCompte.php"> <!-- Fomrulaire envoyant le nom et prénom au controller par POST -->
            <div>
                <div>
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" placeholder="Nom" required> 
                </div>
                <div>
                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" placeholder="Prénom" required>
                </div>
            </div>

            <button type="submit">Valider</button> <!-- Tous les champs sont requis -->
        </form>
        <form method="POST" action="./Controller/ControllerSupprimerCompte.php"> <!-- Formulaire n'envoyant aucune donnée, il s'agit d'une redirection vers le controller de suppression de compte -->
            <button type="submit">Supprimer le compte</button>
        </form>
    </main>

    <script src="./assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#ResumeProfil").load("Controller/ControllerClientInfo.php", { // Appel du controller de resumé du profil

            });
        });
    </script>
</body>

</html>