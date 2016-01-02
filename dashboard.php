<?php
require_once '_defines.php';
require_once 'data/main_data.php';
$site_data[PAGE_ID] = 'dashboard';
require_once 'view_parts/_page_base.php';
?>

    <div id="main">
    </div>
<?php
$talk_msg_data = array(
    '11' => array(
        'tmsg_time' => '2016-01-04 12:15',
        'tmsg_user' => 'antoinesuper2016',
        'tmsg_color' => '#ff3fd4',
        'tmsg_body' => 'Salut à tous. Il y a quelqu\'un en 2016 icitte ?',
    ),
    '12' => array(
        'tmsg_time' => '2016-01-04 12:18',
        'tmsg_user' => 'olgato',
        'tmsg_color' => '#2fffda',
        'tmsg_body' => 'Bonne année, j\'ai préparé des super muffins pour la nouvelle année ! Vous êtes tous invités.',
    ),
    '13' => array(
        'tmsg_time' => '2016-01-04 12:30',
        'tmsg_user' => 'jeanpapa',
        'tmsg_color' => '#544eff',
        'tmsg_body' => 'Des muffins ? Olgato, je vais encore prendre 2 libres là ...',
    ),
    '14' => array(
        'tmsg_time' => '2016-01-04 12:45',
        'tmsg_user' => 'patenteur',
        'tmsg_color' => '#fbff3d',
        'tmsg_body' => 'Je vends 25$ mon tout dernier thème wordpress. Visitez ma page web au www.themesapat.ca',
    ),
    '15' => array(
        'tmsg_time' => '2016-01-04 13:00',
        'tmsg_user' => 'mohmouaaaahhhhh',
        'tmsg_color' => '#38ff22',
        'tmsg_body' => 'Monsieur ça va être l\'heure d\'arrèter là. J\'ai pas assez dor...',
    ),
);
foreach($talk_msg_data as $date => $daydata){
    $hour = $daydata["tmsg_time"];
    $user = $daydata["tmsg_user"];
    $color = $daydata["tmsg_color"];
    $text = $daydata["tmsg_body"];
    echo"<li style='background-color: $color'>
             <p>$hour . $user</p>
             <p>$text</p>
        </li>";
}?>
<?php
require_once 'view_parts/_page_buttom.php';
?>