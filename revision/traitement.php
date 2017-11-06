<?php

if($_POST){
    if(strlen($_POST['pseudo']) == 0){
        echo "Vous devez saisir un pseudo";
    }
    else{
        foreach ($_POST as $key => $value) {
            echo ucfirst($key). ' : <strong>'.$value.'</strong><br>';
        }
    }
    $f = fopen("liste.txt", "a");
    fwrite($f, $_POST['pseudo'] . "-" );
    fwrite($f, $_POST['email'] . "\r\n");
    $f = fclose($f);
}
