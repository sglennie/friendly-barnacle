<!DOCTYPE html>
<html>
	<head>
		<title>Members Only!</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="views/style.css" rel="stylesheet">
	</head>
	<body> 

		<?php if (is_admin()) { ?>
			<h1>Admin Area</h1>
			<div id="content">
				<p>You have successfully logged in to the admin's area.</p>
				<p><a href="register.php">Register Member</a> |
					<a href="change_password.php">Change Password</a> |
					<a href="logout.php">Log Out</a></p>
			</div>
		<?php } else { ?>
			<h1>Members Area</h1>
			<div id="content">
				<p>You have successfully logged in to the member's area.</p>
				<p><a href="change_password.php">Change Password</a> |
					<a href="logout.php">Log Out</a></p>
			</div>
		<?php } ?>

	
	<div id="video">
		<video controls width="640" height="480" autoplay muted>
		  <source src="images/eagle.mp4" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	</div>
		
	<!--
		<div id="video">
		<video controls autoplay muted loop>
		  <source src="images/eagle.mp4" type="video/mp4">
			Your browser does not support the video tag.
		</video>
		<video width="640" height="480" autoplay muted>
		  <source src="images/eagle.mp4" type="video/mp4">
			Your browser does not support the video tag.
		</video>
		</div>	-->

	</body>
</html>
