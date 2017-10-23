<h1>Mission  4 : Tableau </h1>

<?php 
    $tab = array(
        "tableau" => array
        (0 => "julien", 
        1 => "nicolas", 
        2 => "mathieu", 
        3 => "christelle",
        4 => "nina", 
        5 =>"johanna"));
    
    foreach ($tab as $key => $value) {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }

    echo $value[2];
    $f = fopen('prenom.txt', 'a');
    fwrite($f, $value[2]."\r\n");
?>