<?php

$pdoREPERTOIRE = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '', array(
                     PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

$resultat = $pdoREPERTOIRE -> query("SELECT * FROM annuaire");
$enregistrement = $resultat -> fetchAll(PDO::FETCH_ASSOC);
echo 'Nombre de résultats : '.$resultat -> rowCount(). '<br><hr>';

echo '<table border ="5">'; // création du tableau HTML
echo '<tr>'; // création de la ligne de titre

for($i = 0; $i < $resultat -> columnCount(); $i++){
    $colonne = $resultat -> getColumnMeta($i);
    echo '<th>'.$colonne['name'].'</th>';
}

echo '</tr>'; // fin de ligne de titre

foreach($enregistrement as $valeur){ // parcourt tous les enregistrements
    echo '<tr>';
        foreach ($valeur as $valeur2) { // parcourt toutes les infos de chaque enregistrement
            echo '<td>'. $valeur2. '</td>';
        }
    echo '</tr>';
}

echo '</table>';
// echo '<tr>';
// foreach ($_POST as $key => $value) {
//     echo '<td>'.ucfirst($key).'</td>';
//     echo '<td>'.$value.'</td>';
// }
// echo '</tr>';


// $resultatHomme = $pdoREPERTOIRE -> query("SELECT COUNT(sexe) FROM annuaire WHERE sexe ='m'");
// $resultatFemme= $pdoREPERTOIRE -> query("SELECT COUNT (sexe) FROM annuaire WHERE sexe ='f'");
//
// $reqHomme = $resultatHomme -> fetch(PDO::FETCH_ASSOC);
// $reqFemme = $resultatFemme -> fetch(PDO::FETCH_ASSOC);
//
// echo 'Il y a '. $reqHomme . ' hommes et '.$reqFemme. ' femmes';


// foreach ($_POST as $key => $value) {
//     echo ucfirst($key). ' : <strong>'.$value.'</strong><br>';
// }
