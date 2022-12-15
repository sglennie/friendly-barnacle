<!DOCTYPE html>
<html>
	<head>
		<title>Reset Password</title>
		<meta charset="utf-8">
		<link href="views/style.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>

		<h1>Reset Password</h1>
		<div id="content">
			<form action="" method="post">
			<div>
				<?php if ($error['alert'] != '') { 
					echo "<div class='alert'>".$error['alert']."</div>"; } ?>
				
				<p>Forgot your password? Enter your email below, and we'll email you a link to reset your password.</p>
				
				<label for="email">Email: *</label>
				<input  type="text" name="email" value="<?php echo $input['email']; ?>"><div class="error"><?php echo $error['email']; ?></div>
			
				<p class="required">* required fields</p>
				
				<input type="submit" name="submit" class="submit" value="Submit">
			</div>
			</form>
		
			<p><a href="login.php">Login</a></p>
		</div>

	</body>
</html>
