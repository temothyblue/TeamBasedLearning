var mysql = require("mysql");
var express = require("express");
var app = express();
var server = require("http").createServer(app);
var io = require("socket.io")(server);
var id = 0;
app.get("/", function(req, res, next) {
  res.sendFile(__dirname + "/public/index.html");
});

app.use(express.static("public"));


var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "usuarios"
});

//Verifica la conección
io.on("connection", function(client) {
  console.log("Client connected...");

  //cuando se conecta un usuario
  client.on("join", function(data) {
    console.log(data);
  });

  //Realiza una consulta para mostrar los mensajes que hay
  client.on("load", function(data){
    con.query("SELECT * FROM mensaje where sala='"+data.name_rom+"' ORDER BY id ASC",function(err,rows){
      if(err) throw err;
      for (var data of rows){
        console.log("Mira el contenido: "+data.contenido);
        console.log(rows);
        }
      client.emit('showrows', rows);
    });
  })
  
  //Realiza una consulta para saber cual es el nombre de la sala, mediante el id
  client.on("query_nom_sala", function(data){
    con.query("SELECT nom_tema as ntm FROM sala where id_sal='"+data.idsal+"'",function(err,rows){
      if(err) throw err;
      for (var data of rows){
        console.log("Mira la query:"+rows);
        }
      client.emit('nom_sala', rows);
    });
  })

  //Realiza una consulta para obtener los participantes de la sala
  client.on("users", function(data){
    con.query("SELECT * FROM alumno WHERE id_sal="+data.name_rom,function(err,rows){
      if(err) throw err;
      client.emit('list', rows);
    });
  });

  //Realiza una consulta para verificar si no ha pasado el tiempo que la sala debe estar abierta
  client.on("check", function(data) {
    con.query("SELECT sala.time_sala, sala.estado FROM sala WHERE id_sal="+data.name_rom,function(err,rows){
      if(err) throw err;
      //var nowdate = new Date().getFullYear().toString()+"-"+new Date().getMonth().toString()+"-"+new Date().getDate().toString()+" "+new Date().getHours().toString()+":"+new Date().getMinutes().toString()+":"+new Date().getSeconds().toString();  
      console.log(rows[0].time_sala.toISOString()<new Date().toISOString()) //Compara fechas
      if(rows[0].time_sala.toISOString()<new Date().toISOString()){
        console.log("MAYOR");
        var aux="UPDATE sala SET estado=1 WHERE id_sal="+data.name_rom;
        con.query(aux,function(err,rows){
          if(err) throw err; });
      }
      client.emit('estado', rows);
    });
  });  

  //Consulta para insertar los mensajes en la base de datos
  client.on("messages", function(data) {
    var query1 = "INSERT INTO mensaje(id,emisor,id_emisor,fecha,contenido,sala,tipo,question) VALUES (";
    var aux    = query1.concat("NULL,"); //id
    aux        = aux.concat("'"+data.username+"',");//nom_emisor
    aux        = aux.concat("'"+data.idusr+"',");//id_emisor
    var fecha  = new Date().toISOString().split('T')[0];
    aux        = aux.concat("'"+fecha+"',");//fecha
    aux        = aux.concat("'"+data.mensaje+"',");//contenido
    aux        = aux.concat("'"+data.idsala+"',");//Sala
    aux        = aux.concat("'"+data.tipo+"',");//Tipo
    aux        = aux.concat("'"+data.question+"')");//tipo
    con.query(aux,function(err,rows){
      if(err) throw err;

      //cuando es una pregunta le asigna un id al li
      if (data.tipo == "mensaje"){ 
      data.id = data.question;
      id += 1;}
      client.emit("thread", data);
      client.broadcast.emit("thread", data);
    });
  });


  //recibe el typing y emite un typing para todos los usuarios
  client.on("typing",function(data) {
	  console.log("Client typing",data.username);
	  client.broadcast.emit('typing', data);
  });

});
server.listen(8001);
