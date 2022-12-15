<!DOCTYPE html>

<html>
	<head>
		<title>Tag Cloud</title>
		<link href="views/tagStyle.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>
		
		<h1>Tag Cloud</h1>
	
		<h2>List:</h2>
		<?php echo $data['tag_list']; ?>
		
		<h2>Cloud:</h2>
		<?php echo $data['tag_cloud']; ?>
	
	<br>
	<p><a href="../../index.html">Home</a></p>	
	</body>
</html>
