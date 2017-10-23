<?php

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

$msg='';

if(!empty($_POST)){
    if(empty($_POST['auteur'])){
        $msg .= '<div style=" background-color : red; color : white; padding : 5px;"> Vous n\'avez pas renseigné d\'auteur</div>';
    }
    else{
        if(strlen($_POST['auteur']) < 2 || is_numeric($_POST['auteur']) ){
        $msg .= '<div style=" background-color : red; color : white; padding : 5px;"> Le champs auteur n\'est pas valide : il faut minimum deux lettres </div>';
        }
    }
    if(empty($_POST['titre'])){
            $msg .= '<div style=" background-color : red; color : white; padding : 5px;"> Vous n\'avez pas renseigné de titre </div>';
    }
    else{
        if(strlen($_POST['titre']) < 2 || is_numeric($_POST['titre']) ){
        $msg .= '<div style=" background-color : red; color : white; padding : 5px;"> Le champs titre n\'est pas valide : il faut minimum deux lettres </div>';
        }
    }
    if(empty($msg)){
        $resultat = $pdo -> prepare("INSERT INTO livre (auteur, titre) VALUES (:auteur, :titre)");
        $resultat -> bindParam(':auteur', $_POST['auteur'], PDO::PARAM_STR);
        $resultat -> bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
        $resultat -> execute();
    }
}// fin du if(empty)

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
                <legend>Ajout d'un livre</legend>

                <?= $msg ?>

                <label>Auteur : </label><br>
                <input type="text" name="auteur" value=""><br>
                <label>Titre : </label><br>
                <input type="text" name="titre" value=""><br><br>

                <input type="submit" name="" value="Enregistrement">
            </fieldset>
        </form>
    </body>
</html>
