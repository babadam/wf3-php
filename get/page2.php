<?php

// $_GET représente les paramètres dans l'URL. Il s'agit d'une superglobale, elle doit obligatoirement être écrite en majuscule et l'_' est important.
// Comme toutes les superglobables, $_GET fait partie du langage et est un tableau de données ARRAY.

if(!empty($_GET)){

    echo '<pre>';
    print_r($_GET);
    echo'</pre>';

    echo 'Paramètre 1 : '.$_GET['article'].'<br>';
    echo 'Paramètre 2 : '.$_GET['couleur'].'<br>';
    echo 'Paramètre 3 : '.$_GET['prix'].' €<br>';
}
/*
? article=jean  &   couleur=bleu  &  prix=10
? clé=valeur    &   clé=valeur    &  clé=valeur
*/
?>

<h1>Page 2</h1>
<a href="page1.php">Retour vers la page 1</a>
