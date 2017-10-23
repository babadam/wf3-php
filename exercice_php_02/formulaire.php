<?php

$pdoREPERTOIRE = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

if(!empty($_POST)){
    extract($_POST);
    if(strlen($nom) < 3){
        echo '<p style="color: red; font-size: 140%;">Veuillez renseigner votre nom (3 caractères minimum) !</p>';
    }
    if(strlen($prenom) < 3){
        echo '<p style="color: red; font-size: 140%;">Veuillez renseigner votre prénom (3 caractères minimum) !</p>';
    }
    if((strlen($telephone) != 10) || (is_numeric($telephone) == false)){ // = !is_numeric($telephone)
        echo '<p style="color: red; font-size: 140%;">Veuillez renseigner votre numéro de téléphone (10 chiffres) !</p>';
    }
    foreach ($_POST as $key => $value) {
        echo ucfirst($key). ' : <strong>'.$value.'</strong><br>';
    }

    $insertion = $pdoREPERTOIRE -> exec("INSERT INTO annuaire (nom, prenom, telephone, profession, ville, codepostal, adresse, date_de_naissance, sexe, description) VALUES ('$nom', '$prenom', '$telephone', '$profession', '$ville', '$codepostal', '$adresse', '$date_de_naissance','$sexe', '$description')");

    // Problème : bloquer l'envoi du formulaire vers la BDD quand les 3 conditions des 3 premiers champs ne sont pas remplies.

}


?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Formulaire</title>
        <link rel="stylesheet" href="formulaire.css">
    </head>
    <body>
        <form  action="" method="post">
            <label>Nom *</label><br>
            <input type="text" name="nom"><br>

            <label>Prénom *</label><br>
            <input type="text" name="prenom"><br>

            <label>Téléphone *</label><br>
            <input type="text" name="telephone"><br>

            <label>Profession</label><br>
            <input type="text" name="profession"><br>

            <label>Ville</label><br>
            <input type="text" name="ville"><br>

            <label>Code Postal</label><br>
            <input type="text" name="codepostal"><br>

            <label>Adresse</label><br>
            <textarea name="adresse" rows="3" cols="21"></textarea><br>

            <label>Date de naissance</label><br>
            <input type="date" name="date_de_naissance"><br><br>

            <label>Sexe</label><br>
            <input type="radio" name="sexe" value="m" id="sexe">
            <label for="sexe">Homme</label>
            <input type="radio" name="sexe" value="f" id="sexe">
            <label for="sexe">Femme</label><br><br>

            <label>Description</label><br>
            <textarea name="description" rows="5" cols="25"></textarea><br><br>

            <input type="submit" value="Enregistrement">

        </form>
    </body>
</html>
