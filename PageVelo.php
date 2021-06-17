<!DOCTYPE html>
<html>

<head>
    <title>Vélo</title>
</head>

<body>
    <header>
        <?php
        require('NavBar.php');
        ?>
    </header>
    <main>
        <input id="id_velo" type="hidden" value="<?php echo htmlentities($_GET['Id_Velo']); ?>"> <!-- input invisible permettant de récupérer l'id du vélo par GET, utilisée plus bas -->
        <div id="InfoVelo"></div> <!-- Emplacement des informations du vélo -->

        <?php
        $id_velo = $_GET['Id_Velo']; // On récupère l'id du vélo par GET
        if (isset($_SESSION['admin']) == 1) { // On vérifie si $_SESSION['admin'] est défini pour savoir si l'utilisateur est connecté
            echo "<button onclick=\"location.href='Commande1.php?Id_Velo=$id_velo'\">Commander</button>"; // Si il est connecté, on lui met le lien pour commander, en transmettant l'id du vélo par GET
        } else {
            echo "Connectez vous pour commander ce vélo"; // Si il n'est pas connecté, on lui affiche un message
        }
        ?>

        <form action="./Controller/ControllerAjouterNote.php" method="POST"> <!-- Formulaire permettant d'ajouter une note, en envoyant les informations au controller par POST -->
            <div>
                <input name="id_velo" type="hidden" value="<?php echo htmlentities($_GET['Id_Velo']); ?>"> <!-- Récupération de l'id du vélo -->
                <label for="note">Noter ce vélo :</label></br> <!-- Titre du formulaire de notation -->
                <select id="note" name="note"> <!-- On a 5 notes possibles, à l'utilisateur de choisir -->
                    <option value='0'>0</option>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>.
                </select>
            </div>
            <?php
            if (isset($_SESSION['admin']) == 1) { //On vérifie à nouveau si l'utilisateur est connecté
                echo '<button type="submit">Valider la note</button>'; // Si oui, on affiche le bouton de validation
            } else {
                echo "Connectez vous pour noter ce vélo"; // Sinon, on lui affiche un message
            } ?>
        </form>
        <form id="Formulaire" action="./Controller/ControllerAjouterCommentaire.php" method="POST"> <!-- Formulaire d'ajout de commentaire -->
            <div>
                <input name="id_velo" type="hidden" value="<?php echo htmlentities($_GET['Id_Velo']); ?>"> <!-- On récupère l'id du vélo -->
                <label for="commentaire">Ajouter un commentaire :</label></br>
                <textarea class="form-control" rows="8" name="commentaire" placeholder="Votre commentaire" required></textarea>
            </div>
            <?php
            if (isset($_SESSION['admin']) == 1) { // On vérifie si l'utilisateur est connecté
                echo '<button type="submit">Publier le commentaire</button>'; // Si oui, on affiche le bouton de validation
            } else {
                echo "Connectez vous pour publier un commentaire"; // Sinon, on lui met un message
            } ?>

        </form>
        <div id='Commentaires'></div> <!-- Emplacement des commentaires -->

    </main>

    <script src="./assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#InfoVelo").load("Controller/ControllerVeloInfo.php", { // Appel du controller d'informations du vélo, en envoyant l'id du vélo par POST
                Id_Velo: $("#id_velo").val(),

            });
        });
        $(document).ready(function() {
            $("#Commentaires").load("Controller/ControllerAfficherCommentaire.php", { // Appel du controller d'affichage de commentaire, en envoyant l'id du vélo par POST
                Id_Velo: $("#id_velo").val(),

            });
        });
    </script>

</body>

</html>