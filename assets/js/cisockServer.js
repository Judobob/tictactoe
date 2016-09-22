var http = require('http');
var usernames = {};
var numUsers = 0;
var gameplay =[];
var winflag=0;

	var mysql = require("mysql");

	// First you need to create a connection to the db
	var con = mysql.createConnection({
 	 	host: "localhost",
  		user: "root",
 	 	password: "!uck135",
		database: "codeigniter_db"
	});


function connectDB(){
	con.connect(function(err){
  	if(err){
    		console.log('Error connecting to Db');
    	return;
  	}
  	   console.log('Connection established');
	});
}
	connectDB();	
function disconnectDB(){
	con.end(function(err) {
	});
}


	
function userExists(username){
   if (usernames.player1==username) return true;
   if (usernames.player2==username) return true;
   return false;
}


// Loading the index file . html displayed to the client
var server = http.createServer(function(request, response) {
        response.writeHead(200, {'Content-Type': 'text/html'});
        response.write('hello world');
        response.end();
});

// Loading socket.io
var io = require('socket.io').listen(server);

// When a client connects, we note it in the console
io.sockets.on('connection', function (socket) {
    var addedUser = false;  
    socket.emit('message', {'message': 'hello world'});
    socket.on('add user', function (username) {
    if (addedUser) return;
    if (userExists(username)){
      socket.emit('login', {
      'users': numUsers,
      'usernames': usernames,
    });
    // echo globally (all clients) that a person has connected
    socket.broadcast.emit('user joined', {
      'usernames': usernames,
      'username': username,
      'users': numUsers
    });
    }else{
    ++numUsers;
    usernames["player" + numUsers] = username; 
    }      
    // we store the username in the socket session for this client
    socket.username = username;    
    addedUser = true;
    socket.emit('login', {
      'users': numUsers,
      'usernames': usernames,
    });
    // echo globally (all clients) that a person has connected
    socket.broadcast.emit('user joined', {
      'usernames': usernames,
      'username': username,
      'users': numUsers
    });
  });
  socket.on('make move', function (data) {
	gameplay.push(data.move)
  	socket.broadcast.emit('make move', {'move': data.move})
  });
  socket.on('reset game', function (data) {
	winflag=0;
	gameplay=[];
  	socket.broadcast.emit('reset', {'reset': 'reset'})
  });

  socket.on('win game', function (data) {
	if (winflag==1){
		gamestring=gameplay.toString()
  		var win_insert={player_1:usernames.player1,player_2:usernames.player2,result:data.win,game_play:gamestring}
		var query = con.query('INSERT INTO game_results SET ?', win_insert, function(err, result) {
		gameplay=[];
	});
	console.log(query.sql);
		winflag=2;
	}else if(winflag==2){
		winflag=0;
	}else{
		winflag=1;
	}
  });

});



server.listen(8080);
console.log('server up!');