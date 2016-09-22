var http = require('http');
var usernames = {};
var numUsers = 0;

function userExists(username){
   console.log(usernames)
   console.log(username)
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
  socket.on('make move', function (username) {
     console.log('move!');
  });
});

server.listen(8080);
console.log('server up!');