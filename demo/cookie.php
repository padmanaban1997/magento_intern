<?php

	$cookie_name="user";

	$cookie_value="raj";

	setcookie($cookie_name,$cookie_value,time()+(86000),"/");

?>





</!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
		echo $_COOKIE[$cookie_name];

		setcookie($cookie_name,$cookie_value,time()-(86000),"/");
	?>



</body>
</html>
