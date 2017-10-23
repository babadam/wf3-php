<?php
require_once('../inc/init.inc.php');



// traitement pour ajouter un produit dans la boutique
if(!empty($_POST)){
    debug($_POST);
    debug($_FILES);

    // renommer la photo :ref_time()_com.ext
    // controle sur la photo
    // enregistrer la photo sur le serveur

    // controle sur les infos du formulaire (pas vide, nb de caractère ect)
    // requête pour insérer les infos dans la BDD
    // redirection sur gestion_boutique.php

    $nom_photo = 'default.jpg';


    if(!empty($_FILES['photo']['name'])){ // Si une photo est uploadé

        $nom_photo = $_POST['reference']. '_' .time(). '_' . $_FILES['photo']['name']; // Si la photo est nommé tshirt.jpg, on la renomme : XX21-1543234454_tshirt.jpg pour éviter les doublons possible sur le serveur

        $chemin_photo = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . 'photo/' . $nom_photo;
        // chemin : c://xampp/htdocs/PHP/site/photo/XX21-1543234454_tshirt.jpg

        $ext = array('image/png', 'image/jpeg', 'image/gif');

        if(!in_array($_FILES['photo']['type'], $ext)){
            $msg .= '<div class="erreur"> Images autorisées : PNG, JPG, JPEG et GIF </div>'; // Si le fichier uploadé ne correspond pas aux extenstions autorisées (ici, PNG, JPG, JPEG et GIF ) alors on affiche un message d'erreur.
        }

        if($_FILES['photo']['size'] > 2000000){
            $msg .= '<div class="erreur"> Images : 2Mo maximum autorisé </div>'; // SI la photo uploadée est trop volumineurse (ici 2Mo max) alors on met un message d'erreur.
            // PAr défaut XAMPP autorise 2.5Mo. Voir dans php.ini, rechercher max_filesize=2.5M
        }

        if(empty($msg) && $_FILES['photo']['error'] == 0){
            copy($_FILES['photo']['tmp_name'], $chemin_photo); // On enregistre la photo sur le serveur. Dans les faits, on la copier depuis son emplacement temporaire et on la colle dans so emplacement définitif.
        }
    }// fin du if isset($_FILES['photo']['name'])

    //Insérer les infos du produit en BDD
    // Au préalable nous aurions vérifier tous les champs(taille, caractères, no empty tcc ...)

    if(empty($msg)){
        $resultat = $pdo -> prepare("INSERT INTO produit (reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES(:reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)");
        $resultat -> bindParam(':reference', $_POST['reference'], PDO::PARAM_STR);
        $resultat -> bindParam(':categorie', $_POST['categorie'], PDO::PARAM_STR);
        $resultat -> bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
        $resultat -> bindParam(':description', $_POST['description'], PDO::PARAM_STR);
        $resultat -> bindParam(':couleur', $_POST['couleur'], PDO::PARAM_STR);
        $resultat -> bindParam(':taille', $_POST['taille'], PDO::PARAM_STR);
        $resultat -> bindParam(':public', $_POST['public'], PDO::PARAM_STR);
        $resultat -> bindParam(':photo', $nom_photo, PDO::PARAM_STR);
        $resultat -> bindParam(':prix', $_POST['prix'], PDO::PARAM_STR);
        $resultat -> bindParam(':stock', $_POST['stock'], PDO::PARAM_INT);

        if($resultat -> execute()){
            $pdt_insert = $pdo -> lastInsertId(); // récupère l'id du dernier enregistement
            header('location:gestion_boutique.php?msg=validation&id='.$pdt_insert);
        }
    }

}// fin du if(!empty($_POST))
$page = 'Gestion boutique';
require_once('../inc/header.inc.php');
?>
<!-- Contenu HTML -->
<h1>Ajout d'un produit</h1>

<form action="" method="post" enctype="multipart/form-data">
    <?= $msg ?>
    <label>Référence :</label>
    <input type="text" name="reference" value="">

    <label>Catégorie :</label>
    <input type="text" name="categorie">

    <label>Titre :</label>
    <input type="text" name="titre" value="">

    <label>Description :</label>
    <textarea name="description" rows="8" cols="20"></textarea>

    <label>Couleur :</label>
    <input type="text" name="couleur" value="">

    <label>Taille :</label>
    <input type="text" name="taille" value="">

    <label>Public :</label>
    <select name="public">
        <option value="m" selected>Homme</option>
        <option value="f" >Femme</option>
        <option value="mixte" >Mixte</option>
    </select>

    <label>Photo :</label>
    <input type="file" name="photo">

    <label>Prix :</label>
    <input type="text" name="prix" value="">

    <label>Stock :</label>
    <input type="text" name="stock" value="">

    <input type="submit" name="enregistrement" value="Ajouter">
</form>







<?php
require_once('../inc/footer.inc.php');
?>
