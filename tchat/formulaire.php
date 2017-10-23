<?php
$pdo = new PDO('mysql:host=localhost;dbname=tchat', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

$msg = '';

if(!empty($_POST)){

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
        <meta charset="utf-8">
        <title>Tchat PHP</title>
    </head>
    <body>
        <h1>Inscription au tchat</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <?= $msg ?>
            <input type="text" name="pseudo" placeholder="Pseudo">

            <input type="password" name="mdp" placeholder="Mot de passe">

			<label>Avatar : </label>
			<input type="file" name="photo" value="">

            <input type="text" name="email" placeholder="Email">

            <input type="submit" value="Inscription">

        </form>
    </body>
</html>
