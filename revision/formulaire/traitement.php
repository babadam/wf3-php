<?php

echo '<pre>'; print_r($_POST); echo '</pre>';

// echo '<table border=1>';
// echo '<th>';
foreach ($_POST as $key => $value) {
    echo ucfirst($key). ' : <strong>'.$value.'</strong><br>';
