<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Login with CodeIgniter</title>
<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
 </head>
 <body>
   <div class="container">
   	
	<div class="col-md-6 col-md-offset-3">
	<h1>Tic Tac Toe</h1>
   	<?php echo validation_errors(); ?>
   	<?php echo form_open('VerifyLogin'); ?>
	<div class="form-group">
     	<label for="username">Username:</label>
     	<input type="text" class="form-control"  id="username" name="username"/>
	</div>
     	<div class="form-group">
     	<label for="password">Password:</label>
     	<input type="password" class="form-control"  id="passowrd" name="password"/>
     	</div>
	<div class="form-group">
     	<button type="submit" class="btn btn-default">Submit</button>
	</div>
	</div>
	</div>
   </form>
</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.1.0.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
 </body>
</html>