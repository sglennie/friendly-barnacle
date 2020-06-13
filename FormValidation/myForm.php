<!DOCTYPE HTML>
<html>
	<head>	
		<title>My Form Validator</title>
		<!-- Reference to JavaScript Validator
		<script src="jquery.js"></script>  
		<script src="validate.js"></script>  
		-->
		<script>
			$(document).ready(function()
			{
				jQuery.validator.addMethod("phoneUS", function(phone_number, element) 
				{
					phone_number = phone_number.replace(/\s+/g, ""); 
					return this.optional(element) || phone_number.length > 9 &&
					phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
				}, "Please specify a valid phone number");		
				
				$("#form").validate();
			
			});
		</script>

		<style type="text/css">
			body { font-family: Arial; font-size: 12px; }
			fieldset { border:0; }
			label { display: block; width: 180px; float:left; clear:both; margin-top: 10px; }
			label em { display: block; float:right; padding-right:8px; color:red; }
			textarea, input { float:left; width: 220px; padding: 2px; }
			textarea { height: 180px; }
			#submit { margin-left:180px; clear:both; width:100px; }
			
			label.error { float: left; color: red; clear:none; width:200px; padding-left: 10px; font-size: 11px; }
			.required_msg { padding-left: 180px; clear:both; float:left; color:red; }
		</style>
	</head>
	<body>
		
		<form method="post" id="form">
			<fieldset>
			
				<label for="name">Name: <em>*</em></label>
				<input type="text" name="name" id="name" class="required" value="<?php echo $form['name']; ?>"><?php echo $error['name'] ?>
				
				<label for="phone">Phone (000-000-0000): <em>*</em></label>
				<input type="text" name="phone" id="phone" class="required phoneUS" value="<?php echo $form['phone']; ?>"> <?php echo $error['phone'] ?>
				
				<label for="fax">Fax (000-000-0000):</label>
				<input type="text" name="fax" id="fax">				
				<label for="email">Email: <em>*</em></label>
				<input type="text" name="email" id="email" class="required email" value="<?php echo $form['email']; ?>"> <?php echo $error['email'] ?>
				
				<label for="comments">Comments:</label>
				<textarea name="comments" id="comments"><?php echo $form['comments']; ?></textarea>
				
				<p class="required_msg">* required fields</p>
				
				<input type="submit" name="submit" id="submit">
			
			</fieldset>
		</form>
		<br>
		<p><a href="../../index.html">Home</a></p>
	</body>
</html>