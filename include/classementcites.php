<?php

$classement = $paquet->get_answer('get_classementj')->{1};
$nombreDePages=$paquet->get_answer('get_classementj')->{2};

if(!empty($joueur)) {
	$writepseudo='<a href="'._('classementcites').'-'.$page.'-pseudo'.$alliance_lien.'" >'._('Pseudo').'</a>';
	$writeniveau='<a href="'._('classementcites').'-'.$page.'-niveau'.$alliance_lien.'" >'._('Niveau').'</a>';
	$writevictoires='<a href="'._('classementcites').'-'.$page.'-victoires'.$alliance_lien.'" >'._('Victoires').'</a>';
	$writedefaites='<a href="'._('classementcites').'-'.$page.'-defaites'.$alliance_lien.'" >'._('Défaites').'</a>';
	$writeterrain='<a href="'._('classementcites').'-'.$page.'-terrain'.$alliance_lien.'" >'._('Terrain').'</a>';
	$writexp='<a href="'._('classementcites').'-'.$page.'-xp'.$alliance_lien.'" >'._('XP').'</a>';
	$writealliance='<a href="'._('classementcites').'-'.$page.'-alliance'.$alliance_lien.'" >'._('Alliance').'</a>';
	$writeparrain = '<a href="'._('classementcites').'-'.$page.'-filleuls'.$alliance_lien.'" >'._('Filleuls').'</a>';
}
else {
	$writepseudo='<a href="'._('classementcites').'-'.$page.'-pseudo'.$alliance_lien.'" >'._('Pseudo').'</a>';
	$writeniveau='<a href="'._('classementcites').'-'.$page.'-niveau'.$alliance_lien.'" >'._('Niveau').'</a>';
	$writevictoires='<a href="'._('classementcites').'-'.$page.'-victoires'.$alliance_lien.'" >'._('Victoires').'</a>';
	$writedefaites='<a href="'._('classementcites').'-'.$page.'-defaites'.$alliance_lien.'" >'._('Défaites').'</a>';
	$writeterrain='<a href="'._('classementcites').'-'.$page.'-terrain'.$alliance_lien.'" >'._('Terrain').'</a>';
	$writexp='<a href="'._('classementcites').'-'.$page.'-xp'.$alliance_lien.'" >'._('XP').'</a>';
	$writealliance='<a href="'._('classementcites').'-'.$page.'-alliance'.$alliance_lien.'" >'._('Alliance').'</a>';
	$writeparrain = '<a href="'._('classementcites').'-'.$page.'-filleuls'.$alliance_lien.'" >'._('Filleuls').'</a>';
}

if ($par == 'victoires') {
	$writevictoires='<span class="jaune">'._('Victoires').'</span>';
}
elseif ($par == 'defaites') {
	$writedefaites='<span class="jaune">'._('Défaites').'</span>';
}
elseif ($par == 'terrain') {
	$writeterrain='<span class="jaune">'._('Terrain').'</span>';
}
elseif ($par == 'alliance') {
	$writealliance='<span class="jaune">'._('Alliance').'</span>';
}
elseif ($par == 'pseudo') {
	$writepseudo='<span class="jaune">'._('Pseudo').'</span>';
}
elseif ($par =='xp') {
	$writexp='<span class="jaune">'._('XP').'</span>';
}
elseif ($par =='filleuls') {
	$writeparrain='<span class="jaune">'._('Filleuls').'</span>';
}
else {
	$par='niveau'; 
	$writeniveau='<span class="jaune">'._('Niveau').'</span>';
}

echo '
<div id="rech_classement">
<form action="'._('classementcites').'"
      method="post" 
      name="classement">
	<div class="form_rech3"><input type="text"
	                               name="joueur" 
	                               class="form_rech" 
	                               required="required"/></div>
	<div class="form_rech4">
		<div class="bouton_classique"><input type="submit"
		                                     value="RECHERCHER" 
		                                     name="'._('RECHERCHER').'"/></div>
	</div>
	<div class="form_rech5">';

if(($nombreDePages > 1) && empty($joueur)) {
	$pageread = $page;
	$num = $pageread - 3;
	$numl = $pageread + 2;
	if ($num < 1) {
		$num = 1;
	}
	if ($numl > $nombreDePages) {
		$numl = $nombreDePages;
	}

	if ($num > 1) {
		echo '<a href="'._('classementcites').'-1-'.$par.$alliance_lien.'"
		         class="sans_soulign">1</a>  ... ';
	}

	for ($j = $num ; $j <= $numl ; $j++) {
		if($pageread == $j) {
			echo '<span class="gras">'.$j.'</span> ';
		}
		else {
			echo '<a href="'._('classementcites').'-' . $j . '-'.$par.$alliance_lien.'"
			         class="sans_soulign">' . $j . '</a> ';
		}
	}

	if ($numl < $nombreDePages) {
		echo '... <a href="'._('classementcites').'-'.$nombreDePages.'-'.$par.$alliance_lien.'" 
		             class="sans_soulign">'.$nombreDePages.'</a> ';
	}
}

echo '</div>
</form>
</div>

<div id="cadre_classement">
<div id="class_gauche">';

if(($page > 1) && empty($joueur)) {
	echo '<a href="'._('classementcites').'-' . ($page-1) . '-'.
	               $par.$alliance_lien.'"><img src="images/utils/fleche_gauche.png"
	                                           alt="'._('Flèche Gauche').'" 
	                                           title="'._('Flèche Gauche').'" /></a>';
}

echo '
</div>
<div id="class_centre">';

echo '<table>
	<thead>
	<tr>
		<td>&nbsp;N°&nbsp;</td>
		<td>&nbsp;'.$writepseudo.'&nbsp;</td>
		<td>&nbsp;'.$writeniveau.'&nbsp;</td>
		<td class="centrer">&nbsp;'.$writexp.'&nbsp;</td>
		<td>&nbsp;'.$writevictoires.'&nbsp;</td>
		<td>&nbsp;'.$writedefaites.'&nbsp;</td>
		<td>&nbsp;'.$writeterrain.'&nbsp;</td>
		<td>&nbsp;'.$writealliance.'&nbsp;</td>
		<!--<td>&nbsp;'.$writeparrain.'&nbsp;</td>-->
	</tr>
	</thead><tfoot></tfoot><tbody>';

foreach($classement as $do) {
	
echo '<tr>
<td class="droite">&nbsp;'.$i.'&nbsp;</td>
<td class="gauche">&nbsp;<a href="'._('profilsjoueur').'-'.$do->id.'"
                            class="login_class">'.ucfirst($do->login).'</a>&nbsp;</td>
<td class="centrer">&nbsp;'.($do->lvl).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf(round($do->points)).'&nbsp;</td>
<td class="centrer">&nbsp;'.nbf($do->victoires).'&nbsp;</td>
<td class="centrer">&nbsp;'.$do->defaites.'&nbsp;</td>
<td class="centrer">&nbsp;'.nbf($do->terrain).'&nbsp;</td>';

if(!empty($do->nom)) {
	echo '<td>&nbsp;<a href="'._('profilsalliance').'-'.$do->alliance.'"
	                   class="sans_soulign">'.ucfirst(stripslashes($do->nom)).'</a>&nbsp;</td>';
}
else {
	echo '<td class="sans_soulign">&nbsp;'._('Aucune').'&nbsp;</td>';
}

echo '<!--<td class="centrer">&nbsp;'.$do->nb_fil.'&nbsp;</td>-->
</tr>';

	$i++;
}
echo'</tbody></table><br/>
</div>
<div id="class_droite">';
if(($page < $nombreDePages) && empty($joueur)) {
	echo '<a href="'._('classementcites').'-' . ($page+1) . '-'.
	               $par.$alliance_lien.'"><img src="images/utils/fleche_droite.png"
	                                           alt="'._('Flèche Droite').'" 
	                                           title="'._('Flèche Droite').'" /></a>';
}

echo '</div>
</div>';

?>