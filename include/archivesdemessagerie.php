<?php

if(empty($_POST['recherche'])) {
	$_POST['recherche'] = '';
}

if(!empty($_GET['var1']) && $_GET['var1'] == 'supprimer' 
	 && !empty($_GET['var2'])) {
	$paquet = new EwPaquet('supprimer_mp_archive', array($_GET['var2']));
}
elseif(!empty($_GET['var1']) && $_GET['var1'] == 'archiver' 
	 && !empty($_GET['var2'])) {
	$paquet = new EwPaquet('archiver', array($_GET['var2']));
}
else {
	if(empty($_GET['var1'])) {
		$_GET['var1'] = 1;
	} 
	$paquet = new EwPaquet('boite_archive', array($_GET['var1'], $_POST['recherche']));
}

$nombre_pages = $paquet->getRetour();
$messages     = $paquet->getRetour(2);

include('lang/'.LANG.'/include/archivesdemessagerie.php');

?>