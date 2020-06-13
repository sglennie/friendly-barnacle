<!DOCTYPE html>
<html>
	<head>
		<title>Members Area</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="views/style.css" media="screen" rel="stylesheet" type="text/css">
	</head>
	<body>
		<h1>Members Area</h1>
		<div id="content">
		
			<?php 
				$alerts = $this->getAlerts();
				if ($alerts != '') { echo '<ul class="alerts">' . $alerts . '</ul>'; }
			?>

			<p>You have successfully logged in to the member's area.</p>
			
			<p><a href="logout.php">Log Out</a></p>
		
		</div>
	</body>
</html>