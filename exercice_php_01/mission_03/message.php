
<h1>Mission 3 : Message </h1>

<ul>
    <li><a href="message.php?pays=france">France</a></li>
    <li><a href="message.php?pays=italie">Italie</a></li>
    <li><a href="message.php?pays=angleterre">Angleterre</a></li>
    <li><a href="message.php?pays=espagne">Espagne</a></li>
</ul>
<hr>
<?php 
if(!empty($_GET)){
    
    switch($_GET['pays']){
        case 'france' :
            echo "Vous êtes français(e) <br>";
        break;
        case 'italie' :
            echo 'Vous êtes italien(ne) <br>';
        break;
        case 'espagne' :
            echo 'Vous êtes espagnol(e) <br>';
        break;
    
        default :
            echo 'Vous êtes anglais(e) <br>';
        break;
    }

}
?>