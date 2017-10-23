<?php
// Dans le fichier formulaire04.php, nous avons vu comment enregister des données dans un fichier. Ici , nous allons voir comment les récupérer.

$fichier = file('liste.txt'); // La fonction file() fait tout le travail : elle nous retourne toutes les infos de notre fichier sous forme d'array.
// Chaque ligne de notre fichier corresponds à un indice dans l'array.

echo '<pre>';
print_r($fichier);
echo '</pre>';

// Afficher :
foreach ($fichier as $key => $value) {
    $position = strpos($value, ' - ');
    $pseudo = substr($value, 0, $position).'<br>';
    $email = substr($value, $position+3).'<br>';

    echo "<h5> Inscrit n°".($key+1)."</h5>";
    echo "Pseudo : ". $pseudo."<br>";
    echo "Email : ".$email."<br>";
}
?>
