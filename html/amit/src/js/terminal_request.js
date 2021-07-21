$(document).ready(function() {
  $("#submit").click(function(){
  data = {
    "username" : document.getElementById("username").value,
    "password" : document.getElementById("password").value,
    "isSharable": $('input[name=isSharable]:checked').val()

  };
  $.ajax({
    url: "mw/terminal_mw.php",
    type : "POST",
    data : data,
    success: function(result){
      result = JSON.parse(result);
      if(result['status'] == 1){
	url = result['url'];
	window.location = "http://13.233.112.151/amit/index.php?id="+url;
      }
      else{
        alert(result['error']);
      }
  }});

});


});