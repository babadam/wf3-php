<?php 

// 1 : Télécharger 5 images sur google : image1.jpg, image2.jpg, image3.jpg, image4.jpg, image5.jpg

//2 : Afficher l'image grâce à une balise <img>
echo '<img src="image1.jpg" alt="">';
echo '<br><br>';


// 3: Afficher 5 fois l'image 1 graâce à une boucle WHILE.
$i = 0;
while($i < 5){
    echo '<img src="image1.jpg" alt="">';
    $i++;
}


//4. Afficher les 5 images grâce à une boucle WHILE
echo '<br><br>';
$i = 1;
while($i <= 5){
    echo '<img src="image'. $i .'.jpg" alt="">';
    $i ++;        
}

?>