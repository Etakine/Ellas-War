<?php

echo '
<title>'._('Débarras d\'Ellàs War').'</title>
<meta name="description" content="'._('Débarras d\'Ellàs War').'" />';

if(!empty($_POST['nbressource']) && !empty($_POST['prixressource']) &&
   !empty($_POST['type'])) {
	$paquet -> add_action('vendre_debarras',
	                      array($_POST['nbressource'], 
	                            $_POST['type'], 
	                            $_POST['prixressource']));
}

$paquet -> add_action('liste_debarras');

?>