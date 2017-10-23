<?php

// --1. SESSION
session_start();
// ---------------------------------------


// --2. CONNEXION BDD
$pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
));
// ----------------------------------------


// --3. VARIABLES
$msg=''; // $msg permet de communiquer avec l'utilisateur
$page=''; // $page contiendra le nom de la page en cours de visite (menu surbrillance + titre de la page).
$contenu=''; // $contenu nous permettera ponctuellement de stocker du contenu a afficher
//-----------------------------------------


// --4. CHEMINS
define('RACINE_SITE', '/php/site/');
// --5. AUTRES INCLUSIONS
require('fonctions.inc.php');
