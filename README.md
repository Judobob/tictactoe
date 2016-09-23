# tictactoe

Nodejs and socket.io driven multiplayer tictactoe game. 

AUTHOR

Bob Foreman contact@clockworkconsultant.com

WEBSITE

clockworkconsultant.com


Configuration

You will need the nodejs and socket.io installed. The rest is standard lamp. Not tried on nginx but I don't see why not apart from maybe port reconfiguration

Assets/js/cisockServer.js

is the server side file

You will have to configure your server here I used mysql it is with the npm package.

Assets/js/socket.js

is the client.

Bugs

This is part of a test so may go wrong if more than 2 users login at once or players are logged in when server starts. I have fixed most of these but it is just for a test.

To do

Update results visually on the home view when game is completed.