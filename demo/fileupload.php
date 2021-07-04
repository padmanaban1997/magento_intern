<?php

  if(isset($_FILES['image']))
  {




  	$file_name = $_FILES['image']['name'];
  	$file_size =$_FILES['image']['size'];
  	$file_tmp =$_FILES['image']['tmp_name'];
  	$file_type=$_FILES['image']['type'];

  	if(move_uploaded_file($file_tmp,"upload/".$file_name))

  	{
  		echo "successfully uploaded";

  	}
  	else
  	{
  		echo "not uploaded";
  	}

  } 
?>

<!DOCTYPE html>	
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="image"><br>
		<input type="submit" >
	</form>

</body>
</html>