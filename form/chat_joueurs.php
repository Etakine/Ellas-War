<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('joueurs_chat');
$paquet -> send_actions();

if(!empty($paquet->get_answer('joueurs_chat'))) {
	$rep = $paquet->get_answer('joueurs_chat')->{1};

	$me  = false;
	
	if(!empty($rep)) {
		foreach($rep as $j) {
			if($j->id == $paquet->get_infoj('id')) {
				$me = true;
			}
			
			echo '<b><a href="'._('profilsjoueur').'-'.$j->id.'"
									target="_blank"
									'.($j->admin?'class="erreur"':'').'>'.$j->login.'</a></b><br/>';
		}
	}
	
	if($me) {
	echo '<script type="text/javascript">
		$("#cadre_chat_iconeco").attr("src", "images/utils/mb_connecter.png");
		$("#cadre_chat_iconedeco").show();
	</script>';
	}
	else {
	echo '<script type="text/javascript">
		$("#cadre_chat_iconeco").attr("src", "images/utils/mb_deconnecter.png");
		$("#cadre_chat_iconedeco").hide();
	</script>';
	}
}

?>