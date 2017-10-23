<?php
/*
Il y a plusieurs manières d'effectuer des requêtes avec PDO. query(), exec(), prepare(), execute().
Dans ce fichier, nous allons voir exec(), prepare(), execute(). Query() a été vu dans le fichier pdo.php

Methode exec():
------------------
En pratique, il est préférable de faire toutes les requêtes INSERT - UPDATE - DELETE - REPLACE avec exec().
Valeurs de retour:
    -succès : entier N (INT) : le nombre de ligne affectées
    -echec : FALSE (bool)

-----------------
Méthode prepare() puis execute() :
La requête prepare() peut être utilisée pour toutes les requêtes (SELECT - SHOW - INSERT - DELETE - UPDATE - REPACE)

On utilise la requête prepare lorque l'on a recours des données sensibles à l'intérieur de notre requête.
(données sensibles : $_POST et $_GET). On prépare la requête puis on l'éxécute.

Valeurs de retour:
    prepare():
        -succès et echec : PDOStatement

    execute():
        -succès : TRUE
        -echec : FALSE (bool)

-----------------------
$resultat = $PDO -> query("SELECT * FROM employes")
$resultat = $PDO -> query("SELECT * FROM employes WHERE prenom='jean-pierre'")
$resultat = $PDO -> prepare("SELECT * FROM employes WHERE prenom = '$_POST[prenom]'")
traitements ...
$resultat -> execute

$resultat = $pdo -> exec("INSERT INTO employes (prenom, nom, salaire) VALUES ('Yakine', 'Hamida', (1500)")

$resultat = $pdo -> prepare("INSERT INTO employes (prenom, nom, salaire) VALUES ('$_POST[prenom]', '$_POST[nom]', $_POST[salaire]")
traitements ...
$resultat -> execute();

------------------------

*/

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));

try{
    // 0 : Erreur volontaire de requete :
    // $resultat = $pdo -> exec("vfhjfhgfjghfj");

    // 1. INSERT avec exec()
    $resultat = $pdo -> exec("INSERT INTO employes (prenom, nom, service, sexe, salaire, date_embauche) VALUES('toto', 'tata', 'informatique', 'm', '1500', CURDATE())");

    echo 'Nombre de ligne affectée : ' . $resultat . '<br>';
    echo 'Dernier enregistrement : ' .$pdo -> lastInsertId();

    //2. prepare() + execute() + passage d'arguments

    //-------------------
    //2.1 Marqueur '?'
    $prenom = 'Amandine'; // données sensibles

    $resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = ? ");
    $resultat -> execute(array($prenom));

    $nom = 'Thoyer';
    $resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = ? AND nom = ?");
    $resultat -> execute(array($prenom, $nom));
    // Le marqueur '?' dit marqueur non nominatif, permet de transmettre les valeurs sensibles lors de l'éxécution d'une requête préparée.
    // Attention , la méthode éxécute() appartient à notre objet PDOStatement ($resultat) et non à l'objet PDO ($PDO)

    //------------------------
    //2.2 Marqueur ':'
    $prenom = 'Amandine'; // donnée sensible
    $nom = 'Thoyer'; // donnée sensible

    $resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = :prenom AND nom = :nom");
    $resultat -> execute(array(
        'prenom' => $prenom,
        'nom' => $nom
    ));
    //--------------------------
    //2.3 Marqueur ':' + bindParam()
    $prenom = 'Amandine'; // donnée sensible
    $nom = 'Thoyer'; // donnée sensible

    $resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = :prenom AND nom = :nom");

    $resultat -> bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
    $resultat -> execute();

    // Le marqueur ':' dir marqueur nominatif, donne un "nom" à chaque valeur sensible attendue.
    // Avec ce marqueur on peut soit renseigner la valeur dans un array de la methode execute(), soir renseigner la valeur via bindParam().
    // L'avantage de bindParam() est qu'il caste la valeur en derier recours.




}
catch(PDOException $e){
    echo '<div style="padding: 10px; background: red; color: white; font-weight: bold">';
    echo ' <p>Erreur SQL : </p>';
    echo ' <p>Code : ' . $e -> getCode() . '</p>';
    echo ' <p>Message : ' . $e -> getMessage() . '</p>';
    echo ' <p>Fichier : ' . $e -> getFile() . '</p>';
    echo ' <p>Line : ' . $e -> getLine() . '</p>';
    echo '</div>';

    $f = fopen('error_log.txt', 'a');

    $erreur = $e -> getTrace();
    fwrite($f, date('d/m/Y h:i:s') . ' - '. $erreur[0]['file']. ' - '. $erreur[0]['args'][0] . "\r\n");
    // Pour chaque erreur SQL, j'écrit les log dans un fichier .txt :
    // Date du jour - fichier où se trouve l'erreur - requete
    exit; // je stoppe l'exécution du script.
}
