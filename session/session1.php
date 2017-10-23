<?php 

session_start(); // session_start() est une fonction qui va créer un fichier de session. S'il existe déjà, elle va simplement l'ouvrir.

$_SESSION['pseudo'] = 'Barbara';

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

$_SESSION['email'] = 'barbara.tousverts@lepoles.com';

unset($_SESSION['email']); //vide une partie de la session

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

session_destroy(); // supprime le fichier de session. Le code est exécuté à la fin du script 
