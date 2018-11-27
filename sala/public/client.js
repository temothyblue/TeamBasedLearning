

var tipo = " ";
var id = " ";
// initializing socket, connection to server
var socket = io.connect("http://localhost:8000");
socket.on("connect", function(data) {
  socket.username = "joako";
  socket.emit("join", "Hello server from client");

});

// listener for 'thread' event, which updates messages
socket.on("thread", function(data) {
	if (data.tipo == " ") { 
		$("#thread").append("<li id='"+data.id+"'> <a>" + data.username+"</a>: "+data.mensaje + "   <button type='button' onclick='button_on_click(this);'> responder </button></li>" );}
	else {
		$("#"+data.id).append("<li id='"+data.id+"'> <a>         " + data.username+"</a>: "+data.mensaje+"</li>");
		
 }
  
  $('#mensaje').scrollHeight;
});

$(document).ready(function(){

  socket.emit("load",{mensaje:'nada'});
  socket.emit("users",{mensaje:'nada'});
 $('#mensaje').scrollHeight;
 
})

// sends message to server, resets & prevents default form action
$("form").submit(function() {
  var message = $("#message").val();
  var usuario = $("#usuario").val();
  socket.emit("messages", {mensaje:message,username:usuario, tipo:tipo, id:id});
  tipo = " ";
 
  this.reset();
  return false;
});
	 
  //cuando aprientan una tecla
  $('#message').keyup(function() {
    console.log('happening');
    typing = true;
    socket.emit('typing', $("#usuario").val()+" esta escribiendo...");
    timeout = setTimeout(endtyping, 1000);
  });

 //aprietan boton responder
  function button_on_click(elem){
	var responder = $(elem).parent();
	$("#message").val("@"+responder.children('a').text()+" ");
	tipo = "respuesta";
	id = $(elem).parent().attr("id");
	
}

//dejan de presionar teclas despues de 1 segundo
function endtyping() {
    typing = false;
    socket.emit("typing", false);
  }

 
 //avisa a los demas usuarios que estan escribiendo
 socket.on('typing', function(data) {
    if (data) {
      $('.typing').html(data);
    } else {
      $('.typing').html("");
    }
  });
 socket.on('showrows', function(data) {
    console.log(data);
    for (var i of data){
      $("#thread").append("<li>" + i.name_user+": "+i.mensaje + "</li>");      
    }
  });
 socket.on('list', function(data) {
    console.log(data);
    var txt = "";
    for (var i of data){
      txt=txt+i.nom_us+";";     
    }
   
    console.log(txt);
  });
