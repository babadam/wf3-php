<?php 
if(isset($_GET['lang'])){ // Cela signifie que l(utilisateur vient à l'instant de cliquer sur un des liens pour choisir une langue.
    $langue = $_GET['lang'];    
}
elseif (isset($_COOKIE['lang'])){ // Cela signifie que l'utilisateur était déjà venu, et j'avais déjà enregistré son choix dans un cookie.
    $langue = $_COOKIE['lang'];    
}
else{ // Je n'ai ni cookie, ni get précisant la langue, il est possible que l'utlisateur vienne pour la première fois et que la langue par défaut lui convienne.
    $langue = 'fr';    
}

$an = 365 * 24 * 60 * 60;

setCookie('lang', $langue, time() + $an); // setCookie pour permet de créer un cookie
// La fonction attends 3 arguments :
//  1. Le nom du cookie
//  2. La valeur du cookie
//  3. LA date d'expiration (timestamp)

switch($langue){
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

 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <ul>
            <li><a href="?lang=fr">France</a></li>
            <li><a href="?lang=it">Italie</a></li>
            <li><a href="?lang=en">Angleterre</a></li>
            <li><a href="?lang=es">Espagne</a></li>
        </ul>
        <hr>
    </body>
</html>