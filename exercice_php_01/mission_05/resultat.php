<?php
    
    switch($_POST['operateur']){
        case '+' :
            $resultat = $_POST['champs1'] + $_POST['champs2'];
        break;
        case '-' :
            $resultat = $_POST['champs1'] - $_POST['champs2'];
        break;
        case '*
        ' :
            $resultat = $_POST['champs1'] * $_POST['champs2'];
        break;
    
        default :
            $resultat = $_POST['champs1'] / $_POST['champs2'];
        break;
        
        
    }
    echo "Le résultat est " .$resultat;
?>
<br>
<a href="calculatrice.php">Effectuer un autre calcul</a>