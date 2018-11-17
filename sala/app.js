
var mysql = require("mysql");
var express = require("express");
var app = express();
var server = require("http").createServer(app);
var io = require("socket.io")(server);

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


io.on("connection", function(client) {
  console.log("Client connected...");

  //cuando se conecta un usuario
  client.on("join", function(data) {
    console.log(data);
  });

    
  client.on("messages", function(data) {
    client.emit("thread", data);
    client.broadcast.emit("thread", data);
    
  });


  //recibe el typing y emite un typing para todos los usuarios
  client.on("typing",function(data) {
	  console.log("Client typing",data.username);
	  client.broadcast.emit('typing', data);
});

  //lista los usuarios registrados
    con.query('SELECT * FROM usuario',function(err,rows){
      if(err) throw err;
      for (var data of rows){
      	console.log(data.nom_us);}
      client.emit('showrows', rows);
    });


});


server.listen(8000);

