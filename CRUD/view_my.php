<!DOCTYPE html>
<html>
	<head>
		<title>CRUD demo</title>

	</head>
	
	<body>
	
		<h1>View Records</h1>
		
		<p><b>View All</b> | <a href="Paginate.php">View Paginated</a></p>
		
		<?php 
		
				include('connect_db_my.php');
			
				 					
				if ($result = $mysqli->query("SELECT * FROM players ORDER BY id"))
				{
					if ($result->num_rows > 0)
					{
						echo "<table border='1' cellpadding='10'>";
												
						echo "<tr><th>Id</th><th>First Name</th><th>Last Name</th><th></th><th></th></tr>";
						
						
						while ($row = $result->fetch_object())
						{
							echo "<tr>";
							echo "<td>" . $row->Id . "</td>";
							echo "<td>" . $row->firstname . "</td>";
							echo "<td>" . $row->lastname . "</td>";
							echo "<td><a href='records.php?id=" . $row->Id . "'>Edit</a></td>";
							echo "<td><a href='delete.php?id=" . $row->Id . "'>Delete</a></td>";
							echo "</tr>";
						}
						echo "</table>";
					}
					else
					{
						echo "No results to display!";
					}
				}
				else
				{
						echo "Error: " . $msqli->error;
				}
				
				$mysqli->close();
		?>	
		<br>
		<a href="records.php">Add New Record</a>
		<br>
		<p><a href="../../index.html">Home</a></p>
		
		
	</body>
</html>