<?php

include('../header.php');

if(!empty($_GET['ciblej'])) {
  $paquet = new EwPaquet('foudre', array($_GET['ciblej']));
	
	if(!$paquet->hasErreur()) {
		echo $paquet->getRetour();
	}
	else {
		$paquet -> display();
	}
}

?>