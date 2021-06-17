<!DOCTYPE html>
<html>

<head>
	<title>Connexion</title>
</head>

<body>
	<header>
		<?php
		require('NavBar.php');
		?>
	</header>
	<main>
		<div id="container">
			<form action="./Controller/ControllerConnexion.php" method="POST"> <!-- Formulaire qui envoie les informations au controller de connexion -->
				<h1>Connexion</h1>

				<label><b>Pseudo</b></label>
				<input type="text" placeholder="Entrer le pseudo" name="username" required>

				<label><b>Mot de passe</b></label>
				<input type="password" placeholder="Entrer le mot de passe" name="password" required>

				<input type="submit" id='submit' value='LOGIN'>
				<?php // Le controlleur de connexion renvoie un code d'erreur
				if (isset($_GET['erreur'])) { // Si il est défini
					$err = $_GET['erreur'];
					if ($err == 1 || $err == 2) // On vérifie qu'il s'agisse bien d'une erreur du controlleur
						echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>"; // Et donc si l'erreur est valide, on affiche un message d'erreur
				}
				?>
			</form>
		</div>
	</main>
	<footer>
	</footer>
</body>

</html>