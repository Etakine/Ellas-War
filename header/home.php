<?php

echo '
<title>'._('EllasWar.com Jeu de stratégie en ligne gratuit').'</title>
<meta name="description" content="'._(
'Inscrivez-vous et partez à l\'assaut des autres cités sur EllasWar, '.
'un jeu de stratégie en ligne gratuit au temps de l\'antiquité grecque.').
'" />
<meta property="og:title" 
      content="'._('EllasWar.com').'" />
<meta property="og:type" content="Jeu de stratégie en ligne gratuit" />
<meta property="og:url" content="'.SITE_URL.'" />
<meta property="og:image" content="'.STATIC_LINK.'images/logo/ban193x135.png" />';

$paquet -> add_action('get_news', array(5));

if(!empty($_POST['ilogin']) && !empty($_POST['ipass']) && !empty($_POST['iemail'])) {
	if(!empty($_SESSION['parrain']) && !empty($_SESSION['parrain']->id)) {
		$parrain = $_SESSION['parrain']->id;
	}
	else {
		$parrain = 0;
	}
	
	$paquet -> add_action('inscription',
	                      array($_POST['ilogin'], $_POST['ipass'], $_POST['ipass'], 
	                            $_POST['iemail'], $parrain));
}

if(!empty($_POST['login']) && !empty($_POST['pass'])) {
	$paquet -> add_action('connexion', array($_POST['login'], $_POST['pass']));
}

?>
