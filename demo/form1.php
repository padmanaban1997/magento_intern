<!doctype html>
<html>
	<head></head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post">
		<label>Name:</label>
		<input type="text" name="name">
 		<label>age</label>
		<input type="number" name="age">
		<input type="submit" name="submit" value="sumbit">

	</form>
	
	<?php
		if(isset($_POST['submit']))
		{

				echo "name is :".$_POST['name']; 
				echo "<br>";
				echo "age is:".$_POST['age'];
		}
	?>	
</body>
</html>	