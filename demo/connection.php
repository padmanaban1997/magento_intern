<?php

define("db_host","localhost");
define("db_username","root");
define("db_password","root123");
define("db_name","navigate");

$conn =  mysqli_connect(db_host,db_username,db_password,db_name);

	if(!$conn)
	{
		echo "Error in connection ";
	}
	else
	{
    // echo "connection";
	}
	   
?>