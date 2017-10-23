<?php

$mysqli = new Mysqli('localhost', 'root', '', 'entreprise');  //   ==> ETAPE 0 : Connexion à la BDD
// echo '<pre>';                                                 //
// print_r($mysqli);                                             //
// echo '</pre>';                                                //

/*
$mysqli représente un objet de la classe Mysqli. On parle d'instance de la classe Mysqli.
Ce que l'on vient de faire est une instanciation.

L'instance de Mysqli necéssite 4 arguments :
1. serveur où se trouve la BDD
2. login
3. mot de passe
4. nom de la BDD

Méthode (fonction) Query() : la méthode Query de l'objet $mysqli permet d'effectuer des requêtes auprès de la BDD.
Elle attends 1 argument :
1. La formulation de notre requête (STR)

Valeur de retour :
    -> SELECT - SHOW :
        Succès : Mysqli_result (obj)
        Echec : FALSE (BOOL)

    -> UPDATE - INSERT - REPLACE - DELETE :
        Succès : TRUE (BOOL)
        Echec : FALSE (BOOL)
*/


                #########################################
                ## 0 : Erreur volontaire de requête  ####
                #########################################


//$mysqli -> query("jdfjfjdbfjkdb");
// Les erreurs SQL ne sont pas affichées par défaut.
//echo $mysqli -> error; //permet d'afficher les erreurs SQL.



                #########################################################
                ## // 1 : Requête INSERT (ou UPDATE, DELETE, REPLACE)  ##
                #########################################################

// $mysqli -> query("INSERT INTO employes(prenom, nom, sexe, salaire, service, date_embauche) VALUES('Sandra', 'Herisson', 'f', '1900', 'informatique', CURDATE())");





                ###################################################
                ## // 2 : Requête SELECT (avec un seul résultat) ##
                ###################################################


$resultat = $mysqli -> query("SELECT * FROM employes WHERE id_employes = 780"); //query() permet de lancer une requête à la BDD.
// une requête SELECT nous retourne un ou plusieurs résultats. Il faut donc stocker le résultat de la requête.
echo '<pre>';
echo print_r($resultat);
echo '</pre>';
// Le résultat de notre requête est un objet de la classe Mysqli_result.
// En l'état $resultat est INEXPLOITABLE !!!

$employe = $resultat -> fetch_assoc(); // créer un array

echo '<pre>';
echo print_r($employe);
echo '</pre>';

// La méthode (fontion) fetch-assoc() de l'objet $resultat (Mysqli_result) nous permet de créer un array dans lequel les indices sont les noms des champs dans la  table. On parle d'indexation associative.
// fetch_row : indéxation numérique
// fecth_array : effectue une indéxation à la fois associative et à la fois numérique




               ######################################################
               ## // 3 : Reqûete SELECT (avec plusieurs résultats) ##
               ######################################################

$resultat = $mysqli -> query("SELECT * FROM employes");
// $resultat est un objet de la classe Mysqli_result. Il est inexploitable

while($employes = $resultat -> fetch_assoc()){
echo '<pre>';
echo print_r($employes);
echo '</pre>';
}
// Fetch_assoc() nous fait un ARRAY par enregistrement et non un ARRAY avec tous les enregistrements. Je suis donc obligé de la faire dans une boucle While lorsque ma requête me retourne plusieurs résultats.

// La boucle While se comporte comme un cursuer qui parcourt chaque enregistrement pendant que fetch_assoc() les indexe.
// Si une requête vous retourne un seul résultat : pas de boucle nécéssaire.
// Plusieurs résultat : une boucle.
// Si normalement un seul résultat mais potentiellement plusieurs résultats : une boucle


                ######################################################
                ## // 4 : Dupliquer une table SQL en tableau HTML  ##
                ######################################################

$resultat = $mysqli -> query("SELECT * FROM employes");
// $resultat ==> objet Mysqli_result ==> INEXPLOITABLE

echo '<table border ="1">'; // création du tableau HTML

echo '<tr>'; // création de la ligne de titre
while($colonnes = $resultat -> fetch_field()){ // cette boucle grâce a fetch_field () va parcourir ttes les infos des champs de la table et m'afficher le nom de chaques champs dans un <th>.
    echo '<th>' . $colonnes -> name . '</th>';
}
echo '<th colspan="2"> Actions </th>';

echo '</tr>'; // fermeture de la ligne de titre

while($lignes = $resultat -> fetch_assoc()){ // cette boucle grâce à fect_assoc() va parcourir tt les enregistrements de ma table , créer une ligne <tr> pour chacun et stocker les infos dans un ARRAY ($lignes)
    echo '<tr>';

    foreach($lignes as $valeur){ // la boucle foreach() va parcourir les valeurs de chaque enregistrement pour les afficher dans un '<td>'
        echo '<td>' . $valeur . '</td>';
    }
    echo '<td><a href=""> Modifer </a></td>';
    echo '<td><a href=""> Supprimer </a></td>';
    echo '</tr>'; // fin de la ligne correspondant à chaque enregistrement
}
echo '</table>'; // fin du tableau



















 ?>
