$(function(){
	var x = "x"
	var o = "o"
	var winner =""
	var socket = io.connect('http://192.168.0.11:8080');
	var send =0;
	socket.on('message', function(data){
		setUserName();		
	});

	socket.on('login', function(data){
		$("#player1").html(data.usernames.player1);
		$("#player2").html(data.usernames.player2);
	});

	socket.on('user joined', function(data){
		console.log(data.usernames);
    		var users=(data.usernames);
		var username=(data.username);
		var userCount=(data.users);
		$("#player1").html(data.usernames.player1);
		$("#player2").html(data.usernames.player2);
		resetGame();
	})
	socket.on('reset', function(data){
		console.log('hello');
		resetGame();
		});
	socket.on('make move', function(data){
		
		move = "#" +data.move;	
		var username=$("#username").html();
		var player=$("#player1").html();
      		if (player==username){
			$(move).text(o)
			$(move).addClass('disable o btn-info')
		}else{
			$(move).text(x)
			$(move).addClass('disable x btn-info')
      		}
      		winGame() 
		$('#game li').off('click').on('click',function(event) {
   			makeMove(this)
			 
		});
		

	});
function setUserName () {
    var username=$("#player1").html();
    // If the username is valid
    if (username) {
      // Tell the server your username
      socket.emit('add user', username);
    }
  }

$('#game li').on('click',function(event) {
   makeMove(this)   
   		
});

function makeMove(box){
	console.log('hello');
      $('#game li').off("click");
      var move=$(box).attr('id');
      var username=$("#username").html();
      var player=$("#player1").html();
      if (player==username){
	$(box).text(x)
	$(box).addClass('disable x btn-info')
	}else{
	$(box).text(o)
	$(box).addClass('disable o btn-info')
      }
      
      winGame()
      socket.emit('make move',{
      'name': username,
      'move': move
    } );
	
}


$("#reset").on("click",function () {
   resetGame();
   socket.emit('reset game', 'reset game');
  });


function resetGame(){
 
 send =0;
 $("#game li").text("+");
 $("#game li").removeClass('disable')
 $("#game li").removeClass('o')
 $("#game li").removeClass('x')
 $("#game li").removeClass('btn-primary')
 $("#game li").removeClass('btn-info')
 count = 0
}


function winGame(){

	if ($("#one").hasClass('x') && $("#two").hasClass('x') && $("#three").hasClass('x') || $("#four").hasClass('x') && $("#five").hasClass('x') && $("#six").hasClass('x') || $("#seven").hasClass('x') && $("#eight").hasClass('x') && $("#nine").hasClass('x') || $("#one").hasClass('x') && $("#four").hasClass('x') && $("#seven").hasClass('x') || $("#two").hasClass('x') && $("#five").hasClass('x') && $("#eight").hasClass('x') || $("#three").hasClass('x') && $("#six").hasClass('x') && $("#nine").hasClass('x') || $("#one").hasClass('x') && $("#five").hasClass('x') && $("#nine").hasClass('x') || $("#three").hasClass('x') && $("#five").hasClass('x') && $("#seven").hasClass('x'))
        {
		winner=x;
		alert('X Wins!');
        }else if ($("#one").hasClass('o') && $("#two").hasClass('o') && $("#three").hasClass('o') || $("#four").hasClass('o') && $("#five").hasClass('o') && $("#six").hasClass('o') || $("#seven").hasClass('o') && $("#eight").hasClass('o') && $("#nine").hasClass('o') || $("#one").hasClass('o') && $("#four").hasClass('o') && $("#seven").hasClass('o') || $("#two").hasClass('o') && $("#five").hasClass('o') && $("#eight").hasClass('o') || $("#three").hasClass('o') && $("#six").hasClass('o') && $("#nine").hasClass('o') || $("#one").hasClass('o') && $("#five").hasClass('o') && $("#nine").hasClass('o') || $("#three").hasClass('o') && $("#five").hasClass('o') && $("#seven").hasClass('o'))
	{
		winner=o;
		alert('O Wins!');
	 
	}else{
		return;
	}
	socket.emit('win game', {'win': winner});
	resetGame();
}

});

