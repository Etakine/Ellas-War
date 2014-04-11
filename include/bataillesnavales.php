<?php

$stats = $paquet->get_answer('stats_btn')->{1};

echo '
<div class="ligne_50">
	<div class="ligne">
		<h2 class="centrer">Parties en cours</h2>';

if(!empty($paquet->get_answer('info_btn')->{2})) {
	foreach($paquet->get_answer('info_btn')->{2} as $do) {
		if(empty($do->titre)) {
			$do->titre=_('Partie publique');
		}
	
		if($do->places == 4 && 
		   $do->temps < $paquet->get_infoj('timestamp')) {
			$do->titre='<a href="'._('partie').'-'.$do->btn_id.'">'.$do->titre.'</a>';
		}
		else  {
			echo $do->titre.' ('._('En attente').' '.$do->places.'/4)';
		}
		
		echo '<br/>';
	}
}
else {
	echo '<div class="erreur">'._('Aucune partie en cours').'</div>';
}

echo '<br/>';

if(sizeof($paquet->get_answer('info_btn')->{2}) == 0) {
	echo '<div class="centrer">
	<br/>Actuellement : '.$paquet->get_answer('info_btn')->{1}.'/4';
	echo '<br/><a href="'._('bataillesnavales').'-'._('rejoindre').'">'._('Rejoindre la partie publique');
	echo '</a><br/>'._('Prix d\'entrée').' : '.nbf($paquet->get_answer('info_btn')->{3}).' '.imress('drachme');
	echo '</div>';
}

echo '<br/>
	</div>
	<div class="ligne">
		<h2 class="centrer">Statistiques</h2>
		
		<table class="none">
			<tr>
				<td><b>'._('Victoires').' :</b> </td>
				<td>'.$stats->public.'</td>
			</tr>';
			/* echo '
			<tr>
				<td><b>'._('Parties privées gagnées').' :</b> </td>
				<td>'.$stats->privee.'</td>
			</tr>';*/
		echo '</table>
		<br/><br/>
	</div>

</div>
	
<div class="ligne_50">
		<h2 class="centrer">Top 20</h2>
		

</div>';

?>