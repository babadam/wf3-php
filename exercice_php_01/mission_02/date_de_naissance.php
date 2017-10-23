<h1>Mission 2 : Date de naissance</h1>



<form  action="" method="post">
    
<label>Jour </label>
<select>
    <?php
    	for($j=1; $j<32; $j++){
            echo '<option>'.$j.'</option>';
        }	
    ?>
</select>

<label>Mois</label>

<select>
    <?php
        $mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre');
        foreach ($mois as $key) {
            echo '<option>'.$key.'</option>';
        }
    ?>
</select>

<label>Année</label>

<select>
    <?php
        $a = 1900;
    	while($a <= date('Y')){
            echo '<option>'.$a.'</option>';
            $a++;
        }
    ?>
</select>

</form>