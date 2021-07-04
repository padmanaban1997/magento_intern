<?php



require_once("connection.php");
 
//getting id of the data from url
if(isset($_GET['id']))
{
$id = $_GET['id'];
 

$sql = "DELETE FROM crud WHERE id='".$id."'";
$result=mysqli_query($conn,$sql);
}

 header("Location:index.php");
 ?> 
