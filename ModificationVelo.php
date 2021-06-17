<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Modification d'un vélo</title>
</head>

<body>
    <header>
        <?php
        require('NavBar.php');
        ?>
    </header>

    <main>
        <h1>Modifier le vélo <?php echo htmlentities($_GET['Id_Velo']); ?></h1> <!-- On affiche l'id du vélo -->
        <div id="ResumeVelo"></div> <!-- Emplacement de résumé du vélo -->
        <form action="./Controller/ControllerModifierVelo.php?Id_Velo=<?php echo htmlentities($_GET['Id_Velo']); ?>" method="POST"> <!-- Formulaire transmettant les données au controller de modification de vélo -->
            <input id="id_velo" type="hidden" value="<?php echo htmlentities($_GET['Id_Velo']); ?>">
            <div>
                <div>
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" placeholder="Nom" required>
                </div>
                <div>
                    <label for="description">Description :</label>
                    <input type="text" name="description" placeholder="Description" required>
                </div>
                <div>
                    <label for="stock">Stock :</label>
                    <input type="number" name="stock" placeholder="Stock" required>
                </div>
            </div>

            <button type="submit">Valider</button> <!-- Tous les champs sont requis -->

    </main>

    <script src="./assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#ResumeVelo").load("Controller/ControllerResumeVelo.php", { // Appel du controller de résumé de vélo, en transmettant l'id du vélo par POST
                Id_Velo: $("#id_velo").val(),

            });
        });
    </script>
</body>

</html>