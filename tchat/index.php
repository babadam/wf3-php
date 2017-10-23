<?php
session_start(); // On créer le fichier de session
$pdo = new PDO('mysql:host=localhost;dbname=tchat', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

$msg = '';

// TRAITEMENTS POUR LA CONNEXION
if(isset($_POST['connexion'])){ // Si le formulaire de connexion est activé
	if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){// si les deux champs sont remplis on va vérifier : 1. que le membre existe 2. que le mdp est le bon

		// Etape 1 :  Est-ce que le membre existe :
		$resultat = $pdo -> prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
		$resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
		$resultat -> execute();

		if($resultat -> rowCount() > 0){ // cela signifie qu'il existe bien un membre avec ce pseudo
			$membre = $resultat -> fetch(PDO::FETCH_ASSOC);

			// Etape 2 : Est-ce que le mot de passe en BSS correspond au MDP dans le formulaire
			if($membre['mdp'] == $_POST['mdp']){ // Cela signifie que tout est OK, le pseudo existe, le MDP correspond au pseudo ... Donc on connecte le membre
				// $_SESSION['pseudo'] = $membre['pseudo'];
				// $_SESSION['email'] = $membre['email'];
				// $_SESSION['photo'] = $membre['photo'];

				// la même chose dans un foreach
				// On récupère toutes les infos du membre pour les stocker dans le fichier de session. Normalement, il est préférable d'exclure le MDP
				foreach ($membre as $indice => $valeur) {
					$_SESSION[$indice] = $valeur;
				}
				header('location:message.php');

			}
			else{
				$msg .= "Vous n'avez pas saisi le bon mot de passe !";
			}
		}
		else{
			$msg .= "Ce pseudo n'est pas reconnu !";
		}

	}

}

// TRAITEMENTS POUR L'INSCRIPTION
if(isset($_POST['inscription'])){ // Si le formulaire d'inscription est activé

	if(!empty($_FILES['photo']['name'])){ // je vérifie qu'un élément de tableau photo n'est pas vide // Si une photo a été posté
		$nom_photo = time(). '_' . rand(0, 5000) . '_'. $_FILES['photo']['name'];

		if($_FILES['photo']['type'] == 'image/jpeg' ||
		   $_FILES['photo']['type'] == 'image/gif' ||
	       $_FILES['photo']['type'] == 'image/png'){
		}
			if($_FILES['photo']['size'] < 1000000){
				copy($_FILES['photo']['tmp_name'], __DIR__ . '/photo/' . $nom_photo);
			}

	}
	else{
		$nom_photo = 'default.jpg';
	}

	echo '<pre>';
	print_r($_POST);
	print_r($_FILES);
	echo '</pre>';

    if(empty($_POST['pseudo'])){
        $msg .= '<p style="color: white; background: red; padding: 5px">Le champs pseudo est vide</p>';
    }
    if(empty($_POST['mdp'])){
        $msg .= '<p style="color: white; background: red; padding: 5px">Le champs mot de passe est vide</p>';
    }
    if(empty($_POST['email'])){
        $msg .= '<p style="color: white; background: red; padding: 5px">Le champs email est vide</p>';
    }

    if(empty($msg)){
        $resultat = $pdo -> prepare("INSERT INTO membre (pseudo, mdp, email, photo, statut) VALUES (:pseudo, :mdp, :email, :photo, '1')");


        $resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $resultat -> bindParam(':mdp', $_POST['mdp'], PDO::PARAM_STR);
        $resultat -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $resultat -> bindParam(':photo', $nom_photo, PDO::PARAM_STR);

        $resultat -> execute();

    }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tchat Fonderie</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" />
	</head>
	<body>
		<header>
		</header>
		<nav>
		</nav>
		<main>
			<?php if(!empty($msg)) : ?>
			<p style="background:red; color:white; padding:5px; border:2px solid darkred; border-radius: 4px;"><?= $msg ?></p>

			<?php endif; ?>
			<h1>Accueil</h1>

				<div class="inscription">
				<h2>Inscription</h2>
				<p>Vous n'avez pas encore de compte ? Inscrivez-vous :</p>

				<form action="" method="post" enctype="multipart/form-data">

		            <input type="text" name="pseudo" placeholder="Pseudo">

		            <input type="password" name="mdp" placeholder="Mot de passe">

					<label>Avatar : </label>
					<input type="file" name="photo" value="">

		            <input type="text" name="email" placeholder="Email">

		            <input type="submit" name="inscription" value="Inscription">

		        </form>
			</div>

			<div class="connexion">
				<h2>Connexion</h2>
				<p>Si vous avez déjà un compte, connectez-vous :</p>
				<form method="post" action="">
					<input type="text" name="pseudo" placeholder="pseudo" />
					<input type="password" name="mdp" placeholder="Mot de passe" />
					<input type="submit" name="connexion" value="Connexion" />
				</form>
			</div>
		</main>
	</body>
</html>
