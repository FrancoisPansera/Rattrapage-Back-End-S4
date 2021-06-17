<html>

<head>
    <?php include "./Controller/Model/ModeleDB.php"; ?> <!-- On importe le modèle de controlleur, c'est là bas que la connexion avec la BDD s'effectue -->
    <title>Déconnexion</title>
</head>

<body>
    <div id="content">
        <a href='Deconnexion.php?deconnexion=true'><span>Déconnexion</span></a> <!-- Redirection vers la même page, en ajoutant un paramètre en GET -->
        </br>
        <?php
        session_start(); // On démarre ou reprend la session
        if (isset($_GET['deconnexion'])) { // On récupère le paramètre envoyé dans le cas ou on aurait appuyé sur le bouton déconnexion
            if ($_GET['deconnexion'] == true) {
                session_unset(); // Une fois validé, on déconnecte l'utilisateur
                header("location:Connexion.php"); // Et on le redirige vers la page de connexion
            }
        } else if (isset($_SESSION['username']) && $_SESSION['username'] !== "") { // Si le nom d'utilisateur est défini et valide
            $user = $_SESSION['username'];
            echo "<br>Bonjour $user, vous êtes connecté"; // On affiche un message
        }
        $DB = new DB(); // On prépare une nouvelle requête
        $result = $DB->select("SELECT client_id FROM connexion WHERE username = '$user'");
        $fetching = $result->fetch(); // On récupère le résultat
        $Client = $fetching['client_id'];
        $_SESSION['Client'] = (int)$Client; // Et on applique ce résulat à la variable $_SESSION['Client'], qui sera utile pour toute la durée de la navigation de l'utilisateur
        ?>
        </br>
        <a href='Accueil.php'><span>Retour à l'accueil</span></a> <!-- Bouton de retour à l'accueil -->
    </div>
</body>

</html>