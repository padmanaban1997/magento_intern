<!Doctype html>


<html>

<head>
		<style type="text/css">

					table 	{
 									 border-style: solid;
 									 border-color:white;
 									 border-spacing: 15px;
 									 padding-left: 50px;
 									 padding-right: 50px;
 									 padding-top: 25px;
 									 padding-bottom: 25px;
							}

		</style>

		<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="bg">
	<form action="#" name="forms" method="post">

	<center>
	<table >

		<tr>
			<td colspan="2" class="white-text" style="text-align: center;font-size:20px;">Form Data</td>
		</tr>

		<tr>
			<td class="white-text"> 
				<label for="name"> Name:</label>
			</td>
			<td class="white-text">
				<?php echo $_POST['name']; ?>
			</td>
		</tr>

		<tr>
			<td class="white-text" >
				<label for="email">Email:</label>
			</td>
			<td class="white-text">
				<?php echo $_POST['semail']; ?>
				
			</td>
		</tr>

		<tr>
			<td class="white-text" >
				<label for="Detail">Detail:</label>
			</td>
			<td class="white-text">
				<?php echo $_POST['message']; ?>
				
			</td>
		</tr>
		<tr>
			<td class="white-text" >
				<label for="pwd">Password:</label><br>

			</td>
			<td class="white-text"> 
				<?php echo $_POST['pwd']; ?>
			</td>
		</tr>

		<tr>
			<td class="white-text" > 
				<label for="age">Age:</label>
			</td>
			<td class="white-text"> 
				<?php echo $_POST['age']; ?>
			</td>

		</tr>

		<tr>
			<td class="white-text" >
				<label for="Birth Date:">Birth Date:</label>
			</td>

			<td class="white-text">
				<?php echo $_POST['date']; ?><?php echo "/".$_POST['mon']; ?><?php echo "/".$_POST['year']; ?>
				
			</td>

		</tr>
		


		<tr>
			<td class="white-text" >
				<label for="gender">Gender:</label>
			</td>

			<td class="white-text" > 
				<?php echo $_POST['gender']; ?>
			</td>
		</tr>

		<tr>
			<td class="white-text" >
				<label for="state">Choose a state:</label>
			</td>
			<td class="white-text" >
				<?php echo $_POST['state']; ?>
			</td>
		</tr>
    </table>	
	</center>
	</form>

</body>

</html>
