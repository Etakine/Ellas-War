$(function(){
  $("ul.dropdown li").hover(function(){
    $(this).addClass("hover");
    $('ul:first',this).css('visibility', 'visible');
  }, function(){
    $(this).removeClass("hover");
    $('ul:first',this).css('visibility', 'hidden');
  });
});

function deco() {
  $.ajax({
    type: "GET",
    url: "../form/form_deconnexion.php",
    success: function(msg) {
      location.reload();
    }
  });
}

function serialize(obj) {
  var returnVal;
  if(obj != undefined) {
    switch(obj.constructor) {
     case Array:
      var vArr="[";
      for(var i=0;i<obj.length;i++) {
       if(i>0) vArr += ",";
       vArr += serialize(obj[i]);
      }
      vArr += "]"
      return vArr;
     case String:
      returnVal = escape("'" + obj + "'");
      return returnVal;
     case Number:
      returnVal = isFinite(obj) ? obj.toString() : null;
      return returnVal;    
     case Date:
      returnVal = "#" + obj + "#";
      return returnVal;  
     default:
      if(typeof obj == "object") {
       var vobj=[];
       for(attr in obj) {
        if(typeof obj[attr] != "function") {
         vobj.push('"' + attr + '":' + serialize(obj[attr]));
        }
       }
        if(vobj.length >0)
         return "{" + vobj.join(",") + "}";
        else
         return "{}";
      }  
      else {
        return obj.toString();
      }
    }
  }
  return null;
}

function etape_suivante() {
   $.ajax({
     type: "GET",
     url: "form/etape_suivante.php",
     success: function(msg){ $("#etape").html(msg); }
   });
}

