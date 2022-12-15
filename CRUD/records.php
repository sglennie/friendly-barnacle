<?php
	// connect to the database
	include("connect_db_my.php");
	
	//create a function that will display this form
	function renderForm($first = '', $last = '', $error = '', $id = '')
	{ ?>
		<!DOCTYPE HTML>
		<html>
			<head>
				<title>
					<?php if ($id != '') { echo "Edit Record"; } else {echo "New Record";} ?>
				</title>
			</head>
			<body>
				<h1><?php if ($id != '') { echo "Edit Record"; } else {echo "New Record";} ?></h1>
				
				<?php if ($error != '') {
					echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error . "</div>";
				} ?>
				
				<form action="" method ="post">
				<div>
					<?php if ($id != '') { ?>
						<input type="hidden" name="id" value="<?php echo $id; ?>" />
						<p>ID: <?php echo $id; ?></p>
					<?php } ?>
				
					<strong>First Name: *</strong> <input type="text" name="firstname" value="<?php echo $first; ?>"/><br>
					<strong>Last Name: *</strong> <input type="text" name="lastname" value="<?php echo $last; ?>"/>
					<p>* required</p>
					<input type="submit" name="submit" value="submit" />
				</div>
			</body>
		</html>
		
	<?php }
	

        /*
           EDIT RECORD
        */
		
		// if the 'id' variable is set, then we know we need to edit a record
		if (isset($_GET['id']))
		{
				// if the form's submit button is clicked, we need to process the form
				if (isset($_POST['submit'])) 
				{
						// make sure the 'id' in the URL is valid, ensure value in the form is correct.
						if (is_numeric($_POST['id']))
						{
								// get variables from the URL/form, grab the data from the form
								$id = $_POST['id'];
								$firstname = htmlentities($_POST['firstname'], ENT_QUOTES);
								$lastname = htmlentities($_POST['lastname'], ENT_QUOTES);
								
								// check that firstname and lastname are not empty
								if ($firstname == '' || $lastname == '')
								{
										// if they are empty, show an error message and display the form
										$error = 'ERROR: Please fill in all required fields!';
										renderForm($firstname, $lastname, $error, $id);
								}
								else 
								{
										// if all good, update the record in the database
										if ($stmt = $mysqli->prepare("UPDATE players SET firstname = ?, lastname = ? WHERE id = ?"))
										{
												$stmt->bind_param("ssi", $firstname, $lastname, $id);
												$stmt->execute();
												$stmt->close();
										}
										// show an error message if the query has an error
										else
										{
												echo "ERROR: Could not prepare SQL statement.";
										}
										// redirect the user once the form is updated
										header("Location: view_my.php");
								}
						}
						// if the 'id' variable is not valid, show an error message
						else
						{
								echo "Error!";
						}
				}
				// if the form hasn't been submitted yet, get the info from the database and show the form
				else
				{
						// make sure the 'id' value is valid
						if (is_numeric($_GET['id']) && $_GET['id'] > 0)
						{
								// get 'id' from URL
								$id = $_GET['id'];
								
								// get the record from the database using a prepared stmt 
								if($stmt = $mysqli->prepare("SELECT * FROM players WHERE id=?"))
								{
										$stmt->bind_param("i", $id);
										$stmt->execute();
										
										// bind result function returns our variables. Fetch returns the data values.
										$stmt->bind_result($id, $firstname, $lastname);
										$stmt->fetch();
								
										// Show the form
										renderForm($firstname, $lastname, NULL, $id);
										
										$stmt->close();
								}
								// show an error if the query has an error
								else
								{
										echo "Error: could not prepare SQL statement";
								}
						}
						// if the 'id' value is not valid, redirect the user back to the view_my page
						else
						{
								header ("Location: view_my.php");
						}
				}
		}
	

	    /*
          CREATE NEW RECORD
        */

        // if the 'id' variable is not set in the URL, we must be creating a new record
        else
        {
                // if the form's submit button is clicked, we need to process the form
                if (isset($_POST['submit']))
                {
                        // get the form data
                        $firstname = htmlentities($_POST['firstname'], ENT_QUOTES);
                        $lastname = htmlentities($_POST['lastname'], ENT_QUOTES);
                        
                        // check that firstname and lastname are both not empty
                        if ($firstname == '' || $lastname == '')
                        {
                                // if they are empty, show an error message and display the form
                                $error = 'ERROR: Please fill in all required fields!';
                                renderForm($firstname, $lastname, $error);
                        }
                        else
                        {
                                // insert the new record into the database
                                if ($stmt = $mysqli->prepare("INSERT players (firstname, lastname) VALUES (?, ?)"))
                                {
                                        $stmt->bind_param("ss", $firstname, $lastname);
                                        $stmt->execute();
                                        $stmt->close();
                                }
                                // show an error if the query has an error
                                else
                                {
                                        echo "ERROR: Could not prepare SQL statement.";
                                }
                                
                                // redirect the user
                                header("Location: view_my.php");
                        }
                        
                }
                // if the form hasn't been submitted yet, show the form
                else
                {
                        renderForm();
                }
        }
        
        // close the mysqli connection
        $mysqli->close();
?>
