<?php
    function jourSemaine(){

    $jourLocal = "lundi"; //Variable Locale
    return $jourLocal;
    echo "ALLOOOOO";
    }

// echo $jour; ne ofnctionne pas car la variable est locale car est dans la fonction jourSemaine()
// Pour la récupérer

// Il faut réaffecté la variable $jour au nom de la finction pour stocker la valeur dans la variable
$jourGlobal = jourSemaine();
echo $jourGlobal;
echo '<br>';
// ---------------------
// Creer dans l'espace global donc je dois mettre global pouir le nom de la variable puor pouvoir l'utiliser
$pays = 'France';
function affichagePays(){
    global $pays;
    echo $pays;
}

affichagePays();
