<?php

if(empty($_GET['var1'])) {
	redirect();
}

$paquet = new EwPaquet('profils_alliance', array($_GET['var1']));
$all = $paquet -> getRetour();

?>