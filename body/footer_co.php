<?php

echo '<div id="cadre_chat">
	<div id="cadre_chat_titre" class="cursor"><span id="cadre_chat_titre2">'._('Chat').
	'&nbsp;'.
	'<img src="images/utils/mb_deconnecter.png"
	      alt="'._('Connexion au chat').'"
	      id="cadre_chat_iconeco">&nbsp;</span>'.
	'<img src="images/utils/right.png"
	 			alt="Deconnexion"
	      id="cadre_chat_iconedeco"
	      style="display:none;">
	 </div>
	<div id="cadre_chat_interieur" style="display:none;">
		<div id="cadre_chat_interieur_gauche">
				<div id="corps_chat"></div>
				<input type="text" id="texte_chat" />
				<div class="bouton_classique"><input type="submit"
				                                     value="'._('Envoyer').'" 
				                                     name="Envoyer"
				                                     onclick="envoyer_chat()" /></div>
		</div>
		<div id="cadre_chat_interieur_droite">
				<div id="cadre_chat_fermer">
				<img src="images/utils/supprimer_mp.png"
				     alt="Fermer"
				     class="cursor"
				     id="cadre_chat_iconefermer">	 
				
				<img src="images/utils/right.png"
					 			alt="Deconnexion"
					      id="cadre_chat_iconedeco2"
					      class="cursor">
					      
				</div>
				<div class="clear"></div>
				<div id="joueurs_chat"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function() {
	joueurs_chat();
	
	setInterval(\'joueurs_chat()\',3000);
	setInterval(\'refresh_chat(0)\',500);
});

$("#texte_chat").keyup(function(e) {
  if(e.keyCode == 13) {
    envoyer_chat();
  }
});

$("#cadre_chat_titre2").mouseover(function() {
	display_chat();
});

$("#cadre_chat_titre2").click(function() {
	display_chat();
});

$("#cadre_chat_interieur").mouseleave(function() {
	close_chat();
});

$("#cadre_chat_iconefermer").click(function() {
	close_chat();
});

$("#cadre_chat_iconedeco").click(function() {
   $.ajax({
     type: "GET",
     url: "form/chat_deconnexion.php",
     success: function(msg){
			$("#cadre_chat_iconeco").attr("src", "images/utils/mb_deconnecter.png");
			$("#cadre_chat_iconedeco").hide();
     }
   });
});

$("#cadre_chat_iconedeco2").click(function() {
	$("#cadre_chat").css(\'height\', \'auto\');
	$("#cadre_chat").css(\'width\', \'auto\');
	$("#cadre_chat_interieur").hide(\'slow\');
	$("#cadre_chat_titre2").css("color", "black");
	$("#cadre_chat_titre").show();
   $.ajax({
     type: "GET",
     url: "form/chat_deconnexion.php",
     success: function(msg){
			$("#cadre_chat_iconeco").attr("src", "images/utils/mb_deconnecter.png");
			$("#cadre_chat_iconedeco").hide();
     }
   });
});

function display_chat() {
   $.ajax({
     type: "GET",
     url: "form/chat_connexion.php",
     success: function(msg){
			$("#cadre_chat_titre").hide();
			$("#cadre_chat_iconeco").attr("src", "images/utils/mb_connecter.png");
			$("#cadre_chat_interieur").show(\'slow\');
			$("#cadre_chat").css(\'height\', \'auto\');
			$("#cadre_chat").css(\'width\', \'42%\');
			document.getElementById("corps_chat").scrollTop = document.getElementById("corps_chat").scrollHeight;
			refresh_chat(1);
     }
   });
}

function close_chat() {
	$("#cadre_chat").css(\'height\', \'auto\');
	$("#cadre_chat").css(\'width\', \'auto\');
	$("#cadre_chat_interieur").hide(\'slow\');
	$("#cadre_chat_titre2").css("color", "black");
	$("#cadre_chat_titre").show();
}

function joueurs_chat() {
   $.ajax({
     type: "GET",
     url: "form/chat_joueurs.php",
     success: function(msg){
      $("#joueurs_chat").html(msg);
     }
   });
}

function envoyer_chat() {
  var texte = $("#texte_chat").val();
  $("#texte_chat").val(\'\');
  if(texte != \'\') {
    $.ajax({
      type: "GET",
      url: "form/chat_envoyer.php",
      data: "texte=" + texte
    });
  }
}

function refresh_chat(clean) {
   $.ajax({
     type: "GET",
     url: "form/chat_refresh.php?clean="+clean,
     async: false,
     timeout : 450,
     success: function(msg){
       if(msg != \'\') {
         $("#corps_chat").html(msg);
         document.getElementById("corps_chat").scrollTop = document.getElementById("corps_chat").scrollHeight;
       }
     }
   });
}
</script>';

?>
