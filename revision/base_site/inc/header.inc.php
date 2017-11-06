<?php require_once('init.inc.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Site</title>
        <link rel="stylesheet" href="<?= URL; ?>inc/css/style.css">
    </head>
    <body>
        <header>
            <div class="conteneur">
                <a href="<?= URL . 'index.php'; ?>">Monsite.com</a>
                <nav>
                    <a href="<?= URL . 'inscription.php'; ?>">Inscription</a>
                    <a href="<?= URL . 'connexion.php'; ?>">Connexion</a>
                    <a href="<?= URL . 'boutique.php'; ?>">Accès à la boutique</a>
                    <a href="<?= URL . 'panier.php'; ?>">Voir votre panier</a>
                </nav>
            </div>
        </header>
        <section>
            <div class="conteneur">
