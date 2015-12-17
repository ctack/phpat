<?php

$menu = array(
    'Accueil' => 'index.php',
    'contact' => 'contact.php',
    'dasboard' => 'dashboard.php',
    'index' => 'index.php',
);

foreach ($menu as $nom => $url) {
    echo "<li><a href=\"$url\">$nom</a></li>";
}



?>
