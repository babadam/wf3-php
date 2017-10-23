<?php

$msg = array();
$msg['ville'] = '';
$msg['code_postal'] = '';
$msg['adresse'] = '';

if(!empty($_POST)){
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    echo "Adresse saisie : <br>";
    echo " Adresse : ".$_POST['adresse'].'<br>';
    echo " Ville : ".$_POST['ville'].'<br>';
    echo " Code postal : ".$_POST['code_postal'].'<br>';


    foreach($_POST as $indice => $valeur){
        if(empty($valeur)){
            $msg[$indice] = "<p style=\"background:indianred; color:white; padding: 5px; width: 20%; border-radius: 5px; box-shadow: -2px 3px 5px 0px rgba(0,0,0,0.75); text-align:center\">Veuillez renseigner le champs ". $indice. ".</p>";
        }
    }

    // if(empty($_POST['ville'])){
    //     echo "<span style=\"color : red\">Le champs est vide. Veuillez renseigner une ville. </span><br>";
    // }
    // if(empty($_POST['cp'])){
    //     echo "<span style=\"color : red\">Le champs est vide. Veuillez renseigner un code postal. </span><br>";
    // }
    // if(empty($_POST['adresse'])){
    //     echo "<span style=\"color : red\">Le champs est vide. Veuillez renseigner une adresse valide. </span><br>";
    // }
}
 ?>

<h1>Formulaire 2</h1>

<form action="" method="post">
    <?php echo $msg['ville']; ?>
    <label>Ville : </label><br>
    <input type="text" name="ville"><br><br>

    <?php echo $msg['code_postal']; ?>
    <label>Code postal : </label><br>
    <input type="text" name="code_postal"><br><br>

    <?php echo $msg['adresse']; ?>
    <label>Adresse : </label><br>
    <textarea rows="5" cols="22" name="adresse"></textarea><br><br>

    <input type="submit" value="Valider">
</form>
