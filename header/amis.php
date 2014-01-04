<?php
$paquet->add_action('get_mes_amis');

if(!empty($_GET['var1']) && !empty($_GET['var2']) &&
   ($_GET['var2'] == 'supprimer')) {
        $paquet->add_action('supprimer_amis', array($_GET['var1']));
}

$paquet->send_action();

?>
