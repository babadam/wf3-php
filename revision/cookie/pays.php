<?php
if(isset($_GET['pays'])){ // Cela signifie que l(utilisateur vient à l'instant de cliquer sur un des liens pour choisir une langue.
    $pays = $_GET['pays'];
}
elseif (isset($_COOKIE['pays'])){ // Cela signifie que l'utilisateur était déjà venu, et j'avais déjà enregistré son choix dans un cookie.
    $pays = $_COOKIE['pays'];
}
else{ // Je n'ai ni cookie, ni get précisant la langue, il est possible que l'utlisateur vienne pour la première fois et que la langue par défaut lui convienne.
    $pays = 'fr';
}

$un_an = 365 * 24 * 3600;

setCookie('pays', $pays, time() + $un_an);

switch($pays){
    case 'fr' :
        echo 'Bienvenue';
    break;

    case 'es' :
        echo 'Bienvenido';
    break;

    case 'en' :
        echo 'Welcome';
    break;

    case 'it' :
        echo 'Benvenuto';
    break;

    default :
        echo 'Veuillez choisir une langue dans la liste présente';
    break;
}

//$_SESSION créé sur le serveur ; obligé de créer un cookie, ces deux vont être lier vers ID
//$_COOKIE créé sur notre ordinateur
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <ul>
            <li><a href="?pays=fr">France</a></li>
            <li><a href="?pays=it">Italie</a></li>
            <li><a href="?pays=en">Angleterre</a></li>
            <li><a href="?pays=es">Espagne</a></li>
        </ul>
        <hr>
    </body>
</html>
