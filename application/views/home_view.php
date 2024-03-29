<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Tic Tac Toe</title>
   <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("assets/css/tictactoe.css"); ?>" />
 </head>
 <body>
<div class="container-fluid">
<div class="row">

<h2 id ="username"><?php echo $username; ?></h2>
<div class="col-lg-6">
	<div class="col-lg-2">Player1 (X)</div><div id ="player1" class="col-lg-9"><?php echo $username; ?></div>
	<div class="col-lg-2">Player2 (O)</div><div id ="player2" class="col-lg-9"></div>
	<div id="tic-tac-toe" class="col-lg-12">
  		<div class="span3 new_span">
      			<h1 class="span3">Tic Tac Toe</h1>   
    		<ul class="row" id="game">
      			<li id="one" class="btn btn-default span1">+</li>
      			<li id="two" class="btn btn-default span1">+</li>
      			<li id="three" class="btn btn-default span1">+</li>
      			<li id="four" class="btn btn-default span1">+</li>
      			<li id="five" class="btn btn-default span1">+</li>
      			<li id="six" class="btn btn-default span1">+</li>
      			<li id="seven" class="btn btn-default span1">+</li>
      			<li id="eight" class="btn btn-default span1">+</li>
      			<li id="nine" class="btn btn-default span1">+</li>
    		</ul>    
  	</div>
</div>
<div class="col-lg-6">
   <div id="last_games" class="hidden-xs">

   <table id="games" class="table table-striped">
   <?php if( $game_results){ ?>
   <?php foreach($game_results as $result): ?>
   <tr class="game_row ">
	<td>X</td>
	<td>
	<?php echo $result['player_1']; ?>
	</td>
	<td>O</td>
	<td>
	<?php echo $result['player_2']; ?>
	</td>
	<td>
	<?php echo $result['result']; ?> wins!
	</td>
		<td>
		<table class="table table-bordered">
		<tr>
			<td class="one_result">
			<?php	if (in_array("one",$result['odd'])){
					echo 'O';}
				else if(in_array("one", $result['even'])){
					echo 'X';
				}else{
				echo ' ';
				}
			?>
			</td>
			<td class="two_result">
			<?php	if (in_array("two", $result['odd'])){
					echo 'O';}
				else if(in_array("two", $result['even'])){
					echo 'X';
				}else{
				echo ' ';
				}

			?>
			</td>
			<td class="three_result">
			<?php	if (in_array("three", $result['odd'])){
					echo 'O';}
				else if(in_array("three", $result['even'])){
					echo 'X';
				}else{
				echo ' ';
				}

			?>
			</td>
		</tr>
		<tr>
	                <td class="four_result">
			<?php	if (in_array("four", $result['odd'])){
					echo 'O';}
				else if(in_array("four", $result['even'])){
					echo 'X';
				}else{
				echo ' ';
				}

			?>
			</td>
			<td class="five_result">
			<?php	if (in_array("five", $result['odd'])){
					echo 'O';}
				else if(in_array("five", $result['even'])){
					echo 'X';
				}else{
				echo ' ';
				}

			?>
			</td>
			<td class="six_result">
			<?php	if (in_array("six", $result['odd'])){
					echo 'O';}
				else if(in_array("six",$result['even'])){
					echo 'X';
				}else{
				echo ' ';
				}

			?>
			</td>
		</tr>
		<tr>
			
			<td class="seven_result">
			<?php	if (in_array("seven", $result['odd'])){
					echo 'O';}
				else if(in_array("seven", $result['even'])){
					echo 'X';
				}else{
				echo ' ';
				}

			?>
			</td>
			</td>
			<td class="eight_result">
			<?php	if (in_array("eight", $result['odd'])){
					echo 'O';}
				else if(in_array("eight",$result['even'])){
					echo 'X';
				}else{
				echo ' ';
				}

			?>
			</td>
			<td class="nine_result">
			<?php	if (in_array("nine", $result['odd'])){
					echo 'O';}
				else if(in_array("nine", $result['even'])){
					echo 'X';
				}else{
				echo ' ';
				}

			?>
			</td>
		</tr>
	</table>
	</td>
	<td>
	<?php echo $result['created']; ?>
	</td>
   </tr>
   <?php endforeach; ?>
<?php } ?>
   </div>
   </table>
</div>
<a href="<?php echo site_url('home/results') ?>" class="btn-success btn span3">Link</a>
   <a href="#" id="reset" class="btn-success btn span3">Restart</a>
   <a href="home/logout" class="btn-success btn span3">Logout</a>
</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.1.0.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<script src="/node_modules/socket.io-client/socket.io.js"></script>
<script src="/assets/js/socket.js"></script>

 </body>
</html>