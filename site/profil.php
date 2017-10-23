<?php
require_once('inc/init.inc.php');

debug($_SESSION);
debug($_SESSION['membre']);

// Traitement pour rediriger l'utilisateur s'il n'est pas connecté
if(!userConnecte()){
    header('location:connexion.php');
}

$page = 'Profil';
extract($_SESSION['membre']);
require_once('inc/header.inc.php');
?>
<!-- Contenu HTML -->
<h1>Profil</h1>
<div class="profil">
    <p class="profil_bienvenue"> Bienvenue, <?= $pseudo ?></p><br>

    <div class="profil_img">
        <img src="<?= RACINE_SITE ?>img/default.jpg">
    </div>

    <div class="profil_infos">
        <ul>
            <li>Pseudo : <b><?= $pseudo ?></b></li>
            <li>Prénom : <b><?= $prenom ?></b></li>
            <li>Nom : <b><?= $nom ?></b></li>
            <li>Email : <b><?= $email ?></b></li>
        </ul>
    </div>

    <div class="profil_adresse">
        <ul>
            <li>Pseudo : <b><?= $adresse ?></b></li>
            <li>Code postal : <b><?= $code_postal ?></b></li>
            <li>Ville : <b><?= $ville ?></b></li>
        </ul>
    </div>
</div>

<div class="profil">
    <h2>Détails des commandes</h2>
    <p>Vous n'avez pas encore passé de commande</p><br>Venez visiter <a href="boutique.php"><u>notre boutique</u></a></p>
</div>



<?php
require_once('inc/footer.inc.php');
?>
