<script type="text/javascript">
$(function(){
        $(".supr_messagerie").click( function() {
                $(this).parent().parent().find("td:parent").hide("slow");
        });
});

function suppr_mp(id){
     $.ajax({
       type: "POST",
       url: "form/supprimer_mp.php",
       data: "id="+id,
       success:
       function(msg){
$("#message_"+id).hide('slow');
       }
     });
}
</script>
