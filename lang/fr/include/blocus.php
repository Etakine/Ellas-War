<?php

if(!empty($do)) {
	if($do->attaquant == $info->id) {
		$ennemis = $do->defenseur_nom;
	}
	else {
		$ennemis = $do->attaquant_nom;
	}
	
	if($do->declaration < time()) {
		echo '<br/><font color="red">Blocus en cours avec l\'alliance '.stripslashes($ennemis).'</font><br/><br/>';
	}
	else {
		echo '<br/><font color="red">Blocus dans peu de temps avec l\'alliance '.stripslashes($ennemis).'</font><br/><br/>';
	}
	
	echo 'Si vous abdiquez, aucune défaite ne sera ajoutée pour votre alliance, 
	mais vous perdrez 10% de votre XP et l\'enemis gagnera la moitier de ces 10%.<br/><br/>';
	
	if($paquet->getid() == $paquet->getidchef()) {
		if($do->fin == 1 && $do->vainqueur != $do->alliance) {
			echo '<a href=\'Blocus-accepter\'>Accepter la paix</a> | 
						<a href=\'Blocus-refuser\'>Refuser la paix</a>';
		}
		elseif($do->fin == 1) {
			echo '<a href=\'BBlocus-abdiquer\'>Abdiquer</a>';
		}
		else {
			echo '<a href=\'Blocus-demander\'>Demander la paix</a> | 
						<a href=\'Blocus-abdiquer\'>Abdiquer</a>';
		}
	}
}
else {
	echo '<div class="centrer">Votre alliance n\'a pour l\'instant aucun blocus en cours</div>';
}
?>