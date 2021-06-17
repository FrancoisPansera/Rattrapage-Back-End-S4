<!DOCTYPE html>
<html>

<head>
    <title>Validation de la commande</title>
</head>

<body>
    <header>
        <?php
        require('NavBar.php');
        ?>
    </header>

    <?php
    $reussite = $_GET['reussite']; // Paramètres envoyé lors de la validation de la commande par GET
    if ($reussite == 1) {
        echo "<div> Votre commande a été prise en compte, nous vous remercions pour votre confiance </div>";
    } else if ($reussite == 0) {
        echo "<div> Une erreur a été rencontrée lors de la validation de votre commande, merci de réesayer </div>";
    }
    ?>
    <a href="./Accueil.php">Retour à l'accueil</a>

</body>

</html>