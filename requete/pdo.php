<?php

// PDO : Php Data Objet

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));


// $pdo représente un objet de la classe PDO. Il "contient" notre connexion à la BDD.
// La classe PDO contient plusieurs méthodes (fonctions) pour effectuer des requêtes auprès de notre BDD.
// ==> Dans ce fichier nous allons voir la méthode query(). Et exec(), prepare() et execute() seront vues dans le fichier pdo_avance.php

// Query() :
/*    Valeurs de retour :
        ->SELECT - SHOW :
            -Succès : PDOStatement (OBJ)
            -Echec : FALSE (BOOL)

        ->INSERT - DELETE - UPDATE - REPLACE :
            -Succès : TRUE(BOOL)
            -Echec : FALSE (BOOL)
*/

#########################################
   // 0 : Erreur volontaire de requête
#########################################
// $pdo -> query("vjfghdfm");
// Par défaut, les erreurs SQL ne s'affichent pas. Pour les afficher, on ajoute le mode d'erreur WARNING au moment de la connexion à la BDD. Ceci est une option de PDO.



//----------------------------------------------------------------------------------------------------------------------
#########################################################
   // 1 : Requête DELETE (ou UPDATE, INSERT, REPLACE)
#########################################################
$pdo -> query("DELETE FROM employes WHERE prenom = 'toto' ");



//-----------------------------------------------------------------------------------------------------------------------
###################################################
   // 2 : Requête SELECT (avec un seul résultat)
###################################################
$resultat = $pdo -> query("SELECT * FROM employes WHERE id_employes = 780");

var_dump($resultat);
//$resultat est un objet issu de la classe PDOStatement; INEPLOITABLE en l'état.
// Pour l"exploiter, je dois faire un fetch()
$employe = $resultat -> fetch(PDO::FETCH_ASSOC);

echo '<pre>';
echo print_r($employe);
echo '</pre>';

echo 'Prénom : '.$employe['prenom'].'</br>';
// $resultat, notre objet PDOStatement inexploitable contient une fonction fetch() qui retourne les résultats de la requête sous forme d'un array.
// La fonction (méthode) fetch() prends plusieurs argements possibles :
/*
    - PDO::FETCH_ASSOC : indéxation associative (les noms des champs deviennent les indices dans notre array)
    - PDO::FETCH_NUM : indéxation numérique (les indices sont des nombres de 0 à N... selon le nombre d'éléments)
    - PDO::FETCH_OBJET : indéxation sous forme d'objet ( les noms des champs deviennent les propriétés de l'objet )
    - 0 argument : indéxation NUM et ASSOC par défaut mais cela est réglable dans les options
*/



//-----------------------------------------------------------------------------------------------------------------------
######################################################
   // 3 : Reqûete SELECT (avec plusieurs résultats)
######################################################
$resultat = $pdo -> query("SELECT * FROM employes");
echo 'Nombre d\'employés : '.$resultat -> rowCount(). '</br>';
// rowCount() nous retourne le nombre de résultats de notre requête.

// $resultat ==> PDOStatement ==> INEXPLOITABLE

// La requête nous retourne plusieurs résultats donc on fait le fetch() dans une boucle.

while($employes = $resultat -> fetch(PDO::FETCH_ASSOC)){
    echo '<pre>';
    echo print_r($employes);
    echo '</pre>';
}


//-----------------------------------------------------------------------------------------------------------------------
################################################################
   // 3.2 : Reqûete SELECT (plusieurs résultats + fetchAll())
################################################################
$resultat = $pdo -> query("SELECT * FROM employes");
//$resultat ==> Objet PDOStatement ==> inexploitable

$employes = $resultat -> fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
echo print_r($employes);
echo '</pre>';

// fetchAll() est pratique car permet de récupérer directement un tableau multidimensionnel contenant tous les résultats de la requête. Cela evite de faire un fetch() dans une boucle.
//fetchAll() reçcoit les mêmes arguments que fetch() ==> PDO::FETCH_ASSOC / PDO::FETCH_NUM / PDO::FETCH_OBJ / 0 argument



//-----------------------------------------------------------------------------------------------------------------------
######################################################
   // 4 : Dupliquer une table SQL en tableau HTML
######################################################

$resultat = $pdo -> query("SELECT * FROM employes");
$employes = $resultat -> fetchAll(PDO::FETCH_ASSOC);
echo 'Nombre de résultats : '.$resultat -> rowCount(). '<br><hr>';

echo '<table border ="1">'; // création du tableau HTML
echo '<tr>'; // création de la ligne de titre

for($i = 0; $i < $resultat -> columnCount(); $i++){
    $colonne = $resultat -> getColumnMeta($i);
    echo '<th>'.$colonne['name'].'</th>';
}

echo '</tr>'; // fin de ligne de titre

foreach($employes as $valeur){ // parcourt tous les enregistrements
    echo '<tr>';
        foreach ($valeur as $valeur2) { // parcourt toutes les infos de chaque enregistrement
            echo '<td>'. $valeur2. '</td>';
        }
    echo '</tr>';
}

echo '</table>';






















?>
