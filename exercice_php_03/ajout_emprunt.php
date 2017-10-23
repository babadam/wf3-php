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
    if(strlen($_POST['prenom']) < 2 || is_numeric($_POST['prenom']) ){
        $msg .= '<div style=" background-color : red; color : white; padding : 5px;"> Le champs prénom n\'est pas valide : il faut minimum deux lettres </div>';
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
                <legend>Ajout d'un emprunt</legend>

                <?= $msg ?>

                <label>Abonné</label><br>
                <select class="" name="abonne">
                    <option>1 - Guillaume</option>
                </select><br>
                <label>Livre</label><br>
                <select class="" name="livre">
                    <option>100 - Guy de Maupassant - Une vie</option>
                </select><br>
                <label>Date sortie</label><br>
                <input type="date" name="date_sortie" value=""><br>
                <label>Date rendue</label><br>
                <input type="date" name="date_rendue" value=""><br><br>

                <input type="submit" name="" value="Enregistrement">
            </fieldset>
        </form>
    </body>
</html>
