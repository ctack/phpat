<?php
$menu = array(
    'Accueil' => 'index.php',
    'Contact' => 'contact.php',
    'Dashboard' => 'dashboard.php',
    'Inscription' => 'inscription.php',
);
foreach ($menu as $nom => $url) {
    echo "<li><a href=\"$url\">$nom</a></li>";
}
