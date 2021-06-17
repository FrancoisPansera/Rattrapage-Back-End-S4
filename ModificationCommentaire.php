<!DOCTYPE html>
<html>

<head>
    <title>Modification du commentaire</title>
</head>

<body>
    <header>
        <?php
        require('NavBar.php');
        ?>
    </header>

    <main>
        <h1>Modifier votre commentaire</h1>
        <div id="Commentaire"></div>
        <form method="POST" action="./Controller/ControllerModifierCommentaire.php"> <!-- Formulaire appellant le controller de modification de commentaire, en transmettant par POST l'id et le commentaire -->
            <div>
                <input name="commentaire" type="hidden" value="<?php echo htmlentities($_GET['Id_Commentaire']); ?>">
                <textarea class="form-control" rows="8" name="commentairevaleur" placeholder="Indiquer votre nouveau commentaire" required></textarea>
            </div>

            <button type="submit">Valider</button>
        </form>
        <form action="./Controller/ControllerSupprimerCommentaire.php" method="GET"> <!-- Formulaire appellant le controller de suppression de commentaire, en transmettant par POST l'id du commentaire -->
            <input name="Id_Commentaire" type="hidden" value="<?php echo htmlentities($_GET['Id_Commentaire']); ?>">
            <button type="submit">Supprimer le commentaire</button>
        </form>
    </main>

    <script src="./assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#Commentaire").load("Controller/ControllerResumeCommentaire.php?Id_Commentaire=<?php echo $_GET['Id_Commentaire'] ?>", {}); // Appel du controller de résumé de commentaire, en envoyant l'id du commentaire par GET
        });
    </script>
</body>

</html>