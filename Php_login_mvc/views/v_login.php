<!DOCTYPE html>
<html>

	<head>
		<title>Log In</title>
		<link href="views/style.css" media="screen" rel="stylesheet">
	</head>

	<body>
		<h1>Log In</h1>

		<div id="content">
		
		
			<form action="" method="post">
			<div>			
				<?php 
				if ($error['alert'] != '') { 
					echo "<div class='alert'>".$error['alert']."</div>"; } ?>
				
				<label for="username">Username: *</label>
				<input  type="text" name="username" value="<?php echo $input['user']; ?>"><div class="error"><?php echo $error['user']; ?></div>
				
				<label for="password">Password: *</label>
				<input type="password" name="password" value="<?php echo $input['pass']; ?>"><div class="error"><?php echo $error['pass']; ?></div>
				
				<p class="required">* required fields</p>
				
				<input type="submit" name="submit" class="submit" value="Submit">
			</div>
			</form>
			
			<p><a href="reset_password.php">Forgot Password?</a></p>
			<br>
			<p><a href="../../index.html">Home</a></p>
 
		
		</div>

	</body>
</html>