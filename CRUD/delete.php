<?php

	include('connect_db_my.php');
	
	if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		$id = $_GET['id'];
		
		if ($stmt = $mysqli->prepare("DELETE FROM players WHERE id = ? LIMIT 1"))
		{
				$stmt->bind_param("i",$id);
				$stmt->execute();
				$stmt->close();
		}
		else 
		{
			echo "ERROR: could not prepare SQL statement.";
		}
		$mysqli->close();
		
		header("Location: view_my.php");
	}
	else
	{
		header("Location: view_my.php");
	}
	
?>
