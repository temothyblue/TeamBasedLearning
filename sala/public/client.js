


// initializing socket, connection to server
var socket = io.connect("http://localhost:8000");
socket.on("connect", function(data) {
  socket.username = "joako";
  socket.emit("join", "Hello server from client");

});

// listener for 'thread' event, which updates messages
socket.on("thread", function(data) {
  $("#thread").append("<li>" + data.username+": "+data.mensaje + "</li>");
});



// sends message to server, resets & prevents default form action
$("form").submit(function() {
  var message = $("#message").val();
  var usuario = $("#usuario").val();
  socket.emit("messages", {mensaje:message,username:usuario});
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

