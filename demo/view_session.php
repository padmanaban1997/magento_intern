<?php

	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php

	  if(isset($_SESSION['username']))

	  {
	  		echo "session is:".$_SESSION['username'];
	  }

		
	?>

</body>
</html>