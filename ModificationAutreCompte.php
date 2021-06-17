<!DOCTYPE html>
<html>

<head>
    <title>Modification d'un compte</title>
</head>

<body>
    <header>
        <?php
        require('NavBar.php');
        ?>
    </header>

    <main>
        <h1>Modifier le profil de:</h1>
        <div id="ResumeProfil"></div> <!-- Emplacement du résumé du profil -->
        <form method="POST" action="./Controller/ControllerModifierCompte.php?Id_Client=<?php echo $_GET['Id_Client'] ?>"> <!-- Formulaire récupérant le nom et prénom, pour les envoyer au controller de modification d'un compte extérieur (pour les admins) par POST, il envoye également l'ID du client par GET-->
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

            <button type="submit">Valider</button> <!-- Tous les champs sont "required", ils ne peuvent donc pas être vides -->
        </form>
        <form  method="POST" action="./Controller/ControllerSupprimerCompte.php?Id_Client=<?php echo $_GET['Id_Client'] ?>"> <!-- Formulaire de suppression d'un autre compte, il renvoie l'id du client par GET -->
            <button type="submit">Supprimer le compte</button>
        </form>
    </main>

    <script src="./assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#ResumeProfil").load("Controller/ControllerClientInfo.php?Id_Client=<?php echo $_GET['Id_Client'] ?>", {}); // Appel du controlleur de résumé du profil du client dans "ResumeProfil", on transmet l'id client par GET
        });
    </script>
</body>

</html>