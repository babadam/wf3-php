<?php

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

$msg='';

if(!empty($_POST)){
    if(empty($_POST['prenom'])){
        $msg .= '<div style=" background-color : red; color : white; padding : 5px;"> Vous n\'avez pas renseigné de prénom </div>';
    }
    else{
        if(strlen($_POST['prenom']) < 2 || is_numeric($_POST['prenom']) ){
        $msg .= '<div style=" background-color : red; color : white; padding : 5px;"> Le champs prénom n\'est pas valide : il faut minimum deux lettres </div>';
        }
    }

    if(empty($msg)){
    $resultat = $pdo -> prepare("INSERT INTO  abonne (prenom) VALUES (:prenom)");
    $resultat -> bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $resultat -> execute();
    }
}
echo '<pre>';
print_r($_POST);
echo '</pre>';

 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bibliothèque - </title>
    </head>
    <body>
        <form action="" method="post">
            <fieldset>
                <legend>Ajout d'un abonné</legend>

                <?= $msg ?>

                <label>Prénom : </label><br>
                <input type="text" name="prenom" value=""><br><br>

                <input type="submit" name="" value="enregistrement">
            </fieldset>
        </form>
    </body>
</html>
