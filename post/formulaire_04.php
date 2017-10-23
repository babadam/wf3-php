<?php

echo '<pre>';
print_r($_POST);
echo '</pre>';

$msg ='';
if(!empty($_POST)){ // On vérifie que post ne soit pas vide avant de faire des traitements. (évite de générer des erreurs quand on a pas rempli de champs)
    foreach($_POST as $indice => $valeur){
        if(empty($valeur)){
            $msg .= "<p style=\"background:indianred; color:white; padding: 5px; width: 20%; border-radius: 5px; box-shadow: -2px 3px 5px 0px rgba(0,0,0,0.75); text-align:center\">Veuillez renseigner le champs ". $indice. ".</p>";
            }
    }

    if(empty($msg)){ // signifie que tout est OK, on peut effectuer les traitements attendus (enregistrer dans la bdd par exemple)
        $msg .= "<p style=\"background:darkkhaki; color:white; padding: 5px; width: 20%; border-radius: 5px; box-shadow: -2px 3px 5px 0px rgba(0,0,0,0.75); text-align:center\">OK </p>";

        // traitement pour enregistrer les infos dans un fichier .txt
        $f = fopen('liste.txt', 'a'); // fopen() est une fonction qui nous permet d'ouvrir un fichier.
        // En mode'a', si le fichier n'existe pas, il va créer automatiquement.
        // Ici, $f va représenter ce fichier.

        fwrite($f, $_POST['pseudo'].' - '.$_POST['email']."\r\n"); // fwrite() nous permet d'enregistrer des inforùations dans un fichier :
                  // arg1 : le fichier ; arg2 : l'info à enregistrer
        }
    else{
        echo '<a href="formulaire_03.php"> Retour au formulaire </a>';
        }
}
    echo $msg;

?>
<h1>Formulaire 4</h1>
