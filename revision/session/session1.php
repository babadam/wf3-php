<?php

session_start();

$_SESSION['pseudo'] = "Baba";
$_SESSION['prenom'] = "Barbara";
$_SESSION['nom'] = "Tousverts";
echo'<hr>';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

// unset($_SESSION['nom']);
// echo'<hr>';
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
