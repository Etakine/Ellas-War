<?php

if(!empty($_GET['var2'])) {
	$type = htmlentities(trim(addslashes($_GET['var2'])));
}
else {
	$type = 'lvl';
}

// On met dans une variable le nombre de messages qu'on veut par page
$nombreDeMessagesParPage = 25; // Essayez de changer ce nombre pour voir :o)

if(!empty($_GET['var1'])) {
  $page = $_GET['var1']; // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
	
}
else {
    $page = 1; // On se met sur la page 1 (par défaut)
}

$i=($page-1)*$nombreDeMessagesParPage+1;

$paquet = new EwPaquet('get_classementa', array($page, $type));
$classement = $paquet->getretour();
$nombreDePages=$paquet->getretour(2);

include('lang/'.LANG.'/include/classementdesalliances.php');

?>