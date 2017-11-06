<?php

function executeRequete($req){
    global $mysqli;
    $resultat = $mysqli->query($req);
    if(!$resultat){
        die('Erreur sur la requête sql.<br> Message : ' . $mysqli->error . "<br> Code : " .$req);
    }
    return $resultat;
}
