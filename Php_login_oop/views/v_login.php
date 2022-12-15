<!DOCTYPE html>
<html>
	<head>
		<title>Log In</title>
		<meta charset="utf-8">
		<link href="views/style.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<h1>Log In</h1>
		<div id="content">
			
			<form action="" method="post">
			<div>
			
				<?php 
					$alerts = $this->getAlerts();
					if ($alerts != '') { echo '<ul class="alerts">' . $alerts . '</ul>'; }
				?>

				<div class="row">
					<label for="username">Username: *</label>
					<input type="text" name="username" value="<?php echo $this->getData('input_user'); ?>">
					<div class="error"><?php echo $this->getData('error_user'); ?></div>
				</div>
				<div class="row">
					<label for="password">Password: *</label>
					<input type="password" name="password" value="<?php echo $this->getData('input_pass'); ?>">
					<div class="error"><?php echo $this->getData('error_pass'); ?></div>
				</div>
				
				<div class="row">
					<p class="required">* required</p>
					
					<input type="submit" name="submit" class="submit" value="Submit">
					<br>
					<br>
					<br>
					<p><a href="../../index.html">Home</a></p>
				</div>
			
			</div>
			</form>

		</div>

	</body>
</html>
