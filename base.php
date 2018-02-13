<h2>Ecriture et affichage</h2>

<!-- Première chose on constaste qu'on peut écrire de l'HTML dans un fichier PHP (l'inverse n'est pas possible) -->

<?php
echo "Bonjour"; // echo est une instruction qui nous permet d'effectuer un affichage
echo "<br>"; // Nous pouvons également générer l'affichage d'HTML grâce à echo.


// ----------------------------------------------     LES COMMENTAIRES     ---------------------------------------------------
echo "<h2>Les commentaires</h2>";
echo "texte"; // Ceci est un commentaire sur une ligne
echo "texte"; /* Ceci est un commentaire
sur plusieurs
ligne */

// ---------------------------      VARIABLES : TYPES, DECLARATION ET AFFECTATION    ----------------------------------------
echo "<h2>Variables : Types, déclaration et affectation :</h2>";

$a = 127; // affectation de la valeur 127 dans la variable $a
echo gettype($a); // entier (INTEGER)
$b = 1.5;
echo gettype($b); // chiffre à virgule (DOUBLE)
$c = "Chaîne de caractère";
echo gettype($c); // chaîne de caractère (STRING)
$d = TRUE;
echo gettype($d); // Boléen (BOOLEAN)

//$ma-super-variable; le '-' est utilisé pour la soustraction
// $ma super variable = 1 -- Erreur : Pas d'espace
$ma_super_variable = 1; // OK ! snake_case
$maSuperVariable = 1; // OK ! camelCase
$MaSuperVariable = 1; // OK ! StreadyCase // PascalCase

// $prénom = "Barbara"; -- Erreur : pas d'accent dans les noms de variable
$prenom = "Barbara"; // OK !
$prenom1 = "Adam"; // OK !
// $2prenom = "Johan"; Erreur : les noms de variables ne peuvent pas commencer par un chiffre

// -----------------------------------------------    LA CONCATENATION    -----------------------------------------------
echo "<h2>La concaténation</h2>";
$x = "Bonjour";
$y = " tout le monde !";

echo $x.$y.'<br>'; // On peut traduire le '.' par 'suivi de';
echo "$x $y <br>"; // même chose sans concaténation - guillemets importants
echo 'Hey ! '.$x.$y.'<br>';
echo 'Hey ! ',$x,$y,'<br>'; // LA concaténation existe également avec ',' mais est très peu utilisée.


// --------------------------------------     CONCATENATION LORS DE L'AFFECTATION    ---------------------------------------
echo '<h2>Concaténation lors de l\'affectation</h2>';
$prenom1 = "Bruno"; // Affectation de la valeur 'Bruno'.
$prenom1 = "Adam"; // Affectation de la valeur 'Adam' qui remplace 'Bruno'.

$prenom2 = "Nicolas"; // Affectation de la valeur 'Nicolas'
$prenom2 .=" Marie"; // Affectation de la valeur 'Marie', cela ajoute la valeur 'Marie' à la valeur 'Nicolas'.
// Explication :
// Cela fait : $prenom2 = $prenom2 . ' Marie';
//             $prenom2 = 'Nicolas'. ' Marie';
echo $prenom2;


// -----------------------------------------     GUILLEMETS ET QUOTES    -------------------------------------------------
echo '<h2>Guillemets et quotes</h2>';
$jour = "Aujourd'hui";
$jour = 'Aujourd\'hui'; // Attention, entre quote, les apostrophes peuvent faire échapper la chaîne de caractère.

$txt = 'Bonjour';
echo $txt . ' tout le monde ! <br>';
echo $txt . " tout le monde ! <br>";

echo "$txt tout le monde ! <br>"; //  /!\ Bien mettre en guillemets, sinon, cela ne fonctionne pas.
echo '$txt tout le monde ! <br>'; // Entre quotes, les variables ne sont pas évaluées mais simplement condirées comme des chaînes de caractères.


// ----------------------------------------    CONSTANTES ET CONSTANTES MAGIQUES    ----------------------------------------
echo '<h2>Constantes et constantes magiques</h2>';
// Une constante, tout comme une variable, permet de conserver (stocker) une valeur. La différence se situe dans le fait qu'on ne puisse pas modifier la valeur d'une constante. Elle est ... CONSTANTE!
define('CAPITALE', 'Paris');
echo CAPITALE . '<br>';
/* Define() est la fonction qui nous permet de créer une constante.
Elle attends deux arguments :
    1 : Le nom de la constante en MAJUSCULE (tjs un STRING)
    2 : La valeur stockée
*/
// ------- Les constantes magiques ------
echo '<h4>Constantes magiques</h4>';
echo __DIR__ . '<br>'; // affiche le dossier dans lequel je suis
echo __FILE__ . '<br>'; // affiche le fichier dans lequel je suis
echo __LINE__ . '<br>'; // affiche la ligne dans laquelle je suis
// __FUNCTION__ : nous retourne la fonction dans laquelle nous sommes __CLASS__, __METHOD__


// --------------------------------------------------     EXERCICE      ---------------------------------------------------------
echo '<h2>Exercices</h2>';


echo '<h4>Exercice n°1</h4>';
// -- 1. Afficher 'Bonjour Barbara TOUSVERTS' en rouge !
$prenom = 'Barbara';
$nom = 'Tousverts';
echo "<p style =\"color: red;\">Bonjour $prenom $nom </p><br>";
     "<p style ='color: red;'>Bonjour $prenom $nom </p><br>";


echo '<h4>Exercice n°2</h4>';
// --2. Afficher 'Bleu - Blanc - Rouge', en utilisant 3 variables (une pour chaque couleur) et la concaténation.
$couleur1 = 'Bleu';
$couleur2 = 'Blanc';
$couleur3 = 'Rouge';
echo $couleur1 . " " . "-" . " " . $couleur2 . " " . "-" . " " . $couleur3 ."<br>";


// -----------------------------------------------------   OPERATEURS ARITHMETIQUE     ----------------------------------------------------------
echo '<h2>Opérateurs arithmétiques : </h2>';

$a = 10;
$b = 2;

echo $a + $b . "<br>"; // Affiche 12
echo $a - $b . "<br>"; // Affiche 8
echo $a * $b . "<br>"; // Affiche 20
echo $a / $b . "<br>"; // Affiche 5
echo $a % $b . "<br>"; // Affiche 0

// Opération et affectation :
$a = 10;
$b = 2;

$a += $b; // $a = $a + $b // = 12
$a -= $b; // 10
$a *= $b; // 20
$a /= $b; // 10


// -------------------------------------------------    STRUCTURES CONDITIONNELLES     ------------------------------------------------------
echo '<h2>Structures conditionnelles : </h2>';

//empty() : teste si c'est vide, False, ou égal à 0 (0=faux en informatique)
//isset() : teste si quelque chose existe
$var1 = 0;
$var2 = 'Mon prénom';
$var3 = '';

if(empty($var1)){

    echo "True var1 <br>";

}
if(empty($var2)){

    echo "False var2 <br>";

}
if(empty($var3)){

    echo "True var3 <br>";

}

// if, else, elseif
$a = 10;
$b = 5;
$c = 2;

if($a > $b){ // Si A est supérieur à B
    echo 'Oui, A est supérieur à B <br>';
}
else{
    echo 'Non, A n\'est pas supérieur à B <br>';
}

// -- && (AND)
if($a > $b && $b > $c){ // Si A est supérieur à B ET EN MEME TEMPS B est supérieur à C
    echo 'OK pour les deux conditions <br>';
}
// TRUE && TRUE ===> TRUE
// TRUE && FALSE ===> FALSE
// FALSE && TRUE ===> FALSE
// FALSE && FALSE ===> FALSE

// -- || (OR)
if($a == 9 || $b >  $c){ // si A contient la valeur 9 OU B est supérieur à C
    echo 'OK pour au moins une des deux conditions <br>';
}
// TRUE || TRUE ===> TRUE
// TRUE || FALSE ===> TRUE
// FALSE || TRUE ===> TRUE
// FALSE || FALSE ===> FALSE

// -- XOR
if($a == 10 OR $b == 6){ // Si SOIT A contient la valeur 10 OU SOIT B contient al valeur 6 (condition exclusive) Il faut qu'il y en ai un VRAI et un FAUX
    echo 'OK pour seulement l\'une des deux conditions <br>';
}
// TRUE XOR TRUE ===> FALSE
// TRUE XOR FALSE ===> TRUE
// FALSE XOR TRUE ===> TRUE
// FALSE XOR FALSE ===> FALSE

// IF ELSEIF ELSE
$a = 10;
$b = 5;
$c = 2;
if($a === 8){
    echo "A contient la valeur 8 <br>";
}
elseif($a != 10){
    echo "A est différend de 10 <br>";
}
else{
    echo "A contient la valeur 10 <br>";
}
// =   --> affectation
// ==  --> comparaison (valeur)
// === --> stricte comparaison (valeur et type)


// -----------------------------------------------    CONDITION SWITCH    --------------------------------------------------------------
echo '<h2>Condition switch : </h2>';

$couleur = 'bleu';

switch($couleur){
    case 'bleu' :
        echo "Vous aimez le bleu <br>";
    break;
    case 'rouge' :
        echo 'Vous aimez le rouge <br>';
    break;
    case 'vert' :
        echo 'Vous aimez le vert <br>';
    break;

    default :
        echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert';
    break;
}

// EXERCICE : faire la même chose mais avec un IF(), ELSEIF(), ELSE ...
$couleur = 'rose';
if($couleur == 'bleu'){
    echo 'Vous aimez le bleu <br>';
}
elseif($couleur == 'rouge'){
    echo 'Vous aimez le rouge <br>';
}
elseif($couleur == 'vert'){
    echo 'Vous aimez le vert <br>';
}
else{
    echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert.';
}


// --------------------------------------------    LES FONCTIONS PREDEFINIES    -----------------------------------------------------
echo '<h2>Les fonctions prédéfinies : </h2>';

// Les fonctions prédéfinies existent dans le langage et permettent d'effectuer des traitements spécifiques.
//Il en existe plusieurs centaines ... Doc officielle PHP : php.net

echo date('d/m/Y h:i:s'); // date() nous permet de récupérer la date du jour, et attends en argument (STRING), le format pour récupérer la date.


// ----------------------------    LES FONCTIONS PREDEFINIES SUR LES CHAINES DE CARACTERES    --------------------------------------------
echo '<h2>Les fonctions prédéfinies sur les chaînes de caractère : </h2>';

$email = 'barbara.tousverts@lepoles.com';
echo strpos($email, '@'); // = string position / Nous retourne l'emplacement d'un caractère dans une chaîne de caractère.
echo '<br>';
/*
Elle attends 2 arguments :
    1. la chaîne de caractère sur laquelle on travaille
    2. le ou les caractère(s) cherchés

Valeurs de retour :
    Succès : N (INT)
    Echec : False (BOOL)
*/
$phrase = "Il pleut aujourd'hui";
echo strlen(utf8_decode($phrase)); // = string length / Nous retoune le nombre de caractères dans une chaîne de caractères
// Plus précisément, cela compte la ressource en nombre d'octets. utf8_decode() 1 caractère = 1 octet.
/*
Elle attends 1 argument :
    1. La chaîne de caractère en question

Valeurs de retour :
    Succès : N (INT)
    Echec : False (BOOL)
*/
echo '<br>';
$texte = "Il était une fois, dans une forêt, des petits enfants qui mangeaient un pique-nique. Quand tout à coup, la pluie tomba";

echo substr($texte, 0, 59) . "... <a href=\"\"> Lire la suite</a>"; // (sub string) / Nous retourne une partie d'une chaîne de caractère
/*
Elle attends 3 arguments :
    1. la chaîne de caractère sur laquelle on travaille
    2. le point de départ
    3. Le nombre de caractère (facultatif)

Valeurs de retour :
    Succès : XXXXXXX (STRING)
    Echec : False (BOOL)
*/

// ----------------------------    LES FONCTIONS UTILISATEURS    --------------------------------------------
echo '<h2>Les fonctions utilisateurs : </h2>';

// les fonctions utilisateurs nous permettent d'effectuer des traitements qui ne sont pas prédéfinies dans le langage.
// Elles sont d'abord déclarées puis éxécutées.

// Fonction pour afficher 'Bonjour' :
// --1. Déclaration :
function bonjour(){
    // instructions...
    echo 'Bonjour ! <br>';
}
// --2. Exécution :
bonjour();

// B. Fonction pour afficher 'Bonjour Adam' :
// --1. Déclaration :
function bonjourPrenom($argument){
    echo 'Bonjour '.$argument. ' ! <br>';
} // je fais un 'Bonjour' de l'argument reçu
// --2. Exécution :
bonjourPrenom('Adam');
bonjourPrenom('Barbara');
bonjourPrenom('tout le monde');


// C. Fonction pour afficher les titre H2
// --1. Déclaration :
function titre($argument){
    echo '<h2>'.$argument.'</h2>';
}
// Les variables $argument sont à portée locale; elles peuvent donc être rééutiliser sans qu'une s'écrase.

//D. Fonction pour appliquer la TVA à un prix HT :
// --1. déclaration
function appliqueTVA($prixHt){
    return $prixHt * 1.2;
}
// --2.Exécution
$montantHt = 164;
echo 'Le montant de votre commande HT, '. $montantHt . '€HT revient à ' . appliqueTva($montantHt) . '€TTC ! <br>';

//Exercice :
// Créer une fonction applique TVA 2, qui va nous retourner un prix TTC, converti soit avec un taux de 20% (1.2)
// soit 10% (1.1) soit 5.5% (1.055)
// --1. Déclaration
function appliqueTva2($prixHt, $taux){ // =1.2 est optionnel
    return $taux * $prixHt;
}
// --2. Exécution
$montantHt = 164;
echo 'Le montant de votre commande TTC s\'élève à ' . appliqueTva2($montantHt, 1.2) . '€. <br>';


// ----------------------------    INCLUSIONS DE FICHIERS    --------------------------------------------
titre("Inclusions de fichier");

// Les inclusions permettent d'inclure des fichiers.
/* Exemple : on peut inclure des partie communes d'un site (compartiment_site), on peux également
inclure du code PHP.*/

// include() : s'il y a une erreur sur le fichier inclus, cela affiche les erreurs et continue le script.
// require() : s'il y a une erreur sur le fichier inclus, cela affiche les erreurs et stop l'éxécution du script.
// include_once() : Même chose que include(), mais si le fichier est inclus plusieurs fois, il ne l'affichera qu'une seul fois.
// require_once() : Même chose que require(), mais si le fichier est inclus plusieurs fois, il ne l'affichera qu'une seul fois.


// ----------------------------    STRUCTURE ITERATIVE : LES BOUCLES   --------------------------------------------
titre("Structure itérative : les boucles");

//WHILE
echo 'Boucle While : <br>';
$i = 0;
while($i < 3){
    // instructions à effectuer
    echo $i . '---';
    $i ++;
}
echo '<br>';
// Exerice : Faire la même chose qui affiche 0---1---2
$i = 0;
while($i < 3){
    // instructions à effectuer
    if($i < 2){ // $i == 0 et $i == 1
        echo $i . '---';
    }
    else{ // $i = 2
        echo $i;
    }
    $i++;
}
echo '<br><br>';

// boucle for
echo 'Boucle For : <br>';
for($i = 0; $i < 3; $i++){
    echo $i .'---';
}

// Exercice 1 : Afficher de 0 à 9 avec une boucle for (0123456789)
echo '<br><br> Exercice 1 : <br>';
for($i = 0; $i < 10; $i++){
    echo $i.'<br>';
}
// Exercice 2 : Afficher de 0 à 9 dans un tableau
echo '<br><br> Exercice 2 : <br>';
echo '<table border ="1">';
echo '<tr>';
for($i = 0; $i < 10; $i++){
    echo '<td>'.$i.'</td>';
}
echo '</tr>';
echo '</table>';

// Exercice 3 : Afficher un tableau avec 10 lignes allant de 0 à 99 (chaque ligne 0-9// 10-19 ... 90 à 99)
echo '<br><br>';



// Modulo
echo '<table border = "1">';
echo '<tr>';
for($i = 0; $i <= 99; $i++){
    if($i%10 == 0){
        echo '</tr><tr>';
    }
    echo '<td>'.$i.'</td>';
}
echo '</tr>';
echo '</table>';

// ----------------------------   TABLEAU DE DONNEES ARRAY  --------------------------------------------
titre("Tableaux de données ARRAY");

// un tableau de données ARRAY, est déclaré un peu comme une variable améliorée, car on ne conserve pas qu'une seule valeur mais plusieurs.
// Les valeurs seront classées.

$liste = array('Yakine', 'Hadi', 'Meryem', 'Corinne', 'Pascal');

// echo $liste; ERREUR : On ne peux pas faire un echo sur un array.

echo '<pre>';
print_r($liste);
echo '</pre>';


titre("Boucle FOREACH pour les ARRAY");
// Les boucles foreach sont un moyen simple de passer en revue un tableau de données array.
// Foreach fonctionne uniquement avec les array ( et objets)

$tab[] = "France";
$tab[] = "Espagne";
$tab[] = "Angleterre";
$tab[] = "Italie";
$tab[] = "Portugal";

echo '<pre>';
print_r($tab);
echo '</pre>';

echo $tab[2];
echo $tab[4] = "Suisse"; // Remplace Portugal par Suisse
echo $tab[] = "Allemagne"; // Création Allemagne

echo '<pre>';
print_r($tab);
echo '</pre>';

echo 'Boucle foreach : <br>';
foreach($tab as $valeur){
    echo $valeur . '<br>';
}
// Le Foreach se comporte comme un curseur qui va parcourir tous les éléments d'un ARRAY.
// Le mot AS fait partie du langage et est obligatoire.
// $valeur va contenir à chaque tour du boucle la valeur trouvée dans l'array.
echo '<br>';

foreach($tab as $indice => $valeur){
    echo 'A l\'indice : ' . $indice . ' se trouve la valeur : ' . $valeur . '<br>';
}
// S'il y a deux variables ($indice => $valeur) dans les paramètres de la boucle foreacch,
// le premier parcours les indices et le second parcours les valeurs.

// Création d'un array avec indices choisis :
$couleur = array(
    "couleur1" => 'Jaune',
    "couleur2" => 'Rouge',
    "couleur3" => 'Vert'
);
echo '<pre>';
print_r($couleur);
echo '</pre>';

// ----------------------------   TABLEAU MULTIDIMENSIONNEL  --------------------------------------------
titre("Tableau multidimensionnel");

$tab_multi = array(
    0 => array(
        'prenom' => 'Hadi',
        'nom' => 'Smail'
    ),
    1 => array(
        'prenom' => 'Meryem',
        'nom' => 'Boularouk'
    )
);
echo '<pre>';
print_r($tab_multi);
echo '</pre>';

?>
