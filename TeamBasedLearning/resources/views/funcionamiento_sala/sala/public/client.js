//0=idsala;1=idusr;2=nameusr;3=rut

//Extrae los datos recibidos en la selección de temas
var url = window.location.href
url = url.substring(23);
aData = url.split("&");
for (var i = 0; i <= aData.length-1; i++) {
  n = aData[i].indexOf("=");
  aData[i]=aData[i].substring(n+1);
}

var tipo = "mensaje";
var id = " ";
$("#responde").hide();
$("#btnrsp").hide();
$("#btncancel").hide();

// Se inicializa socket y se conecta al servidor
var socket = io.connect("http://localhost:8001");
socket.on("connect", function(data) {
  socket.username =aData[2]; 
  $("#nameus").text(aData[2]);
  socket.emit("join", "Hello server from client");
  socket.emit("query_nom_sala",{idsal:aData[0]});

});

//A través del id de la sala se consulta el nombre de esa sala
socket.on("nom_sala", function(data) {
  $("#namesal").text(data[0].ntm);
})

// Escucha el evento THREAD, El cual actualiza los mensajes
socket.on("thread", function(data) {
  //Si es un mensaje normal añade un elemento a la lista, dando la opción de responder a ese mensaje
	if (data.tipo == "mensaje") { 
		//$("#thread").append("<li id='li"+data.id+"'> <a>" + data.username+"</a>: "+data.mensaje+ "   <button type='button' id="+data.id+" name="+data.username+" onclick='button_on_click(this);'> responder </button></li>" );
    $("#thread").append("<li id='li"+data.id+"'> <a>" + data.username+"</a>: "+data.mensaje+ "   <i id="+data.id+" name="+data.username+" class='fa fa-paper-plane' onclick='button_on_click(this);'></i>  </li>" );
  }
	
  else {
  //Si es una respuesta a un mensaje se agregará un "hijo" al mensaje que se busca responder
		$("#li"+data.question).append("<li class='"+data.tipo+"' id='"+data.id+"'> <a>         " + data.username+"</a>: "+data.mensaje+"</li>");
		var c = $("#"+data.id);
    console.log(c[0]);
 }
 data.mensaje="mensaje";
  $('#mensaje').scrollHeight;
});

//Se verifica si no ha expirado el tiempo de abertura de la sala
//Se entrega el nombre de la sala para cargar los mensajes
//Se entrega el nombre de la sala para cargar los usuarios participantes en dicha sala
$(document).ready(function(){
  socket.emit("check",{name_rom:aData[0]});
  socket.emit("load",{mensaje:'nada', name_rom:aData[0]});
  socket.emit("users",{mensaje:'nada',name_rom:aData[0]});
 $('#mensaje').scrollHeight;
})



// Cuando se clickea el boton 'Enviar' se enviaran los mensajes al servidor .... sends message to server, resets & prevents default form action
$("form").submit(function() {
  var message = $("#message").val();
  tipomsj = "mensaje";
  var usuario = aData[2];
  idques = 0;
  socket.emit("messages", {mensaje:message,idusr:aData[1],idsala:aData[0],username:usuario,tipo:tipomsj,question:idques});
  
  tipomsj = "mensaje";
  this.reset();
  return false;
});
	

  //Se activa cuando un determinado usuario presiona una tecla
  $('#message').keyup(function() {
    console.log('happening');
    typing = true;
    socket.emit('typing', aData[2]+" esta escribiendo...");
    timeout = setTimeout(endtyping, 1000);
  });

  //Cuando se envia la respuesta una pregunta se obtiene el id de la pregunta para relacionar el id de la respuesta con el de la pregunta
  $("#btnrsp").click(function(){
    var message = $("#responde").val();
    tipomsj = "respuesta";
    idques = $("#responde").attr("name");
    console.log("Al mensaje :"+message+" Le pongo la question :"+idques);
    var usuario = aData[2];
    socket.emit("messages", {mensaje:message,idusr:aData[1],idsala:aData[0],username:usuario,tipo:tipomsj,question:idques});
    $("#responde").hide(); $("#btnrsp").hide();
    $("#sbt").show();  $("#message").show();
    this.reset();

    return false;
    
  });
  $("#btncancel").click(function(){
    $("#responde").hide(); $("#btnrsp").hide(); $("#btncancel").hide();
    $("#sbt").show();  $("#message").show(); 
  });
 //Cuando se escoge una pregunta para responder
  function button_on_click(elem){
  $("#sbt").hide();
  $("#message").hide();
  $("#responde").show();
  $("#btncancel").show();
  $("#btnrsp").show();
	var responder = $(elem).parent();  
	$("#responde").val("@"+responder.children('a').text()+" ");
  $("#responde").attr("name",elem.id);
  $("#message").attr("target","respuesta");
	tipo = "respuesta";
	id = $(elem).parent().attr("id");
}

//Función para verigicar que se dejan de presionar teclas despues de 1 segundo
function endtyping() {
    typing = false;
    socket.emit("typing", false);
  }

 
 //Función que avisa a los demas usuarios que estan escribiendo
 socket.on('typing', function(data) {
    if (data) {
      $('.typing').html(data);
    } else {
      $('.typing').html("");
    }
  });

 //Carga y muestra los mensajes la primera vez (F5)
 socket.on('showrows', function(data) {
    console.log(data);
    for (var i of data){
      console.log("IMPRIMMO EL ID = "+i.id);
      console.log("IMPRIMMO EL TIPO = "+i.tipo);
      console.log("IMPRIMMO EL EMIS = "+i.emisor);
      console.log("IMPRIMMO EL CONT = "+i.contenido);
      
      if(i.tipo=="mensaje"){
        //$("#thread").append("<li id=li"+i.id+" class='"+i.tipo+"' >" + "<a>" + i.emisor+"</a>:"+i.contenido + "   <button type='button' id="+i.id+" name="+i.emisor+" onclick='button_on_click(this);'> responder </button> </li>");  
        $("#thread").append("<li id=li"+i.id+" class='"+i.tipo+"' >" + "<a>" + i.emisor+"</a>:"+i.contenido + "  <i name="+i.emisor+" id="+i.id+" class='fa fa-paper-plane' onclick='button_on_click(this);'></i>  </li>");  
      }    
      else{
        console.log("entre");
        console.log($("#li"+i.id));
        $("#li"+i.question).append("<li class='"+i.tipo+"' id='"+i.id+"'> <a>" + i.emisor+"</a>: "+i.contenido+"</li>");
        //$("#thread").append("<li id=li"+i.id+" class='"+i.tipo+"' >" + "<a>" + i.emisor+"</a>:"+i.contenido + "</li>"); 
      }
    }
  });

 //Se muestran los participantes de la sala
 socket.on('list', function(data) {
    console.log(data[0].nom_alu);
    for (var j =0; j<=data.length; j++) {
      //console.log(data[j].nom_alu);
      $("#participantes").append("<a>"+data[j].nom_alu+"</a><br>"); 
    }
    var txt = "";
    for (var i of data){
      txt=txt+i.nom_us+";";   
    }
    console.log(txt);
  });

  //Si la sala está abierta habilita la opción del chat
  socket.on('estado', function(data) {
    console.log("Estado de la sala: "+data[0].estado);
    if(data[0].estado==1){
      $("#sbt").hide();
      $("#message").hide();
    }
  });