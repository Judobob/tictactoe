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
<a href="<?php echo site_url('home') ?>">Link</a>
<h2 id ="username"><?php echo $username; ?></h2>
  <table id="games" class="table table-striped">
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
