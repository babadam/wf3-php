<?php

if(!empty($_POST)){
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    
    foreach ($_POST as $key => $value) {
        echo ucfirst($key). ' : <strong>'.$value.'</strong><br>';
    }
}


?>


<h1>Mission 1 : Formulaire</h1>

<form method="post">
    <label>Nom :</label>
    <input type="text" name="nom" placeholder="Mon nom"><br><br>
    
    <label>Prénom :</label>
    <input type="text" name="prenom" placeholder="Mon prénom"><br><br>
    
    <label>Adresse :</label>
    <input type="text" name="adresse" placeholder="Mon adresse"><br><br>
    
    <label>Ville :</label>
    <input type="text" name="ville" placeholder="Ma ville"><br><br>
    
    <label>Code postal :</label>
    <input type="text" name="code_postal" placeholder="Mon code postal"><br><br>
    
    <label>Sexe :</label>
    <select name="genre">
        <option>Homme</option>
        <option>Femme</option>
    </select><br><br>
    
    <label> Description :</label><br>
    <textarea name="description" rows="8" cols="40"></textarea><br><br>
    
    <input type="submit" value="Envoyez">
    
    
</form>