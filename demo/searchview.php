<?php include_once('connection.php');

?>

<!DOCTYPE html>
<html>
<head>

		</style>
	<link rel="stylesheet"  type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" >
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"> 
	<link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
 <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</head>
<body>



	<h1 style="color:blue;font-size: 20px;text-align: center;margin: 20px;">View Data</h1>
       

		 <a href='insert.php'>
         
         	<button style="margin-left:10%;margin-bottom: 10px;">
                    Add New <i class="icon-plus"></i>
             </button>
		  </a>

		  <span style="margin-left:60%;">
          <from method="POST">

		  		<input type="text" name="search" id="search">
          </from>
		  </span>	
  

	<center>
	<table id="example"    class="table table-striped table-bordered" style="width:80%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Detail</th>
                <th>Password</th>
                <th>Age</th>
                <th>Dob</th>
                <th>gender</th>
                <th>state</th> 
                <th>Action</th>
            </tr>

        </thead>
        <tbody>
          
 <?php

	

			       $sql="Select * from crud ";
	
			       $result=mysqli_query($conn,$sql);
	
					       if (!$result) {
    								             printf("Error: %s\n", mysqli_error($conn));
    						  		            exit();
								                }
		            while($row = mysqli_fetch_array($result))
	 		                          {
			                           echo "<tr>";
			                           echo"<td>".$row['id']."</td>";
			                           echo "<td>" . $row['name'] . "</td>";
			                           echo "<td>" . $row['email'] . "</td>";
			                           echo "<td>" . $row['detail'] . "</td>";
			                           echo "<td>" . $row['password'] . "</td>";
			                           echo "<td>" . $row['age'] . "</td>";
			                           echo "<td>" . $row['dob'] . "</td>";
			                           echo "<td>";
				                        	       if($row['gender']==1){echo "Male";}else{echo"Female";};
	 		                           echo "<td>" . $row['state'] . "</td>";
		
		                            echo "<td><a href=\"delete.php?id=$row[id]\"><img src=\"delete1.jpg\" height=''/></a> &nbsp; &nbsp;
		 
						                          <a href=\"update.php?id=$row[id]\"><img src=\"update.jpg\" height=''/></a></td>";
		 
	                           	 echo "</tr>";
	       }

?>

    
        </tbody>
     
    </table>

<script type="text/javascript">
    $(document).ready(function(){
        $("#search").keyup(function(){
            var search = $(this).val();
            $.ajax({
                url:'search.php',
                method:'POST',
                data:{search_term:search},
                success:function(response){
                    $("#example").html(response);
                }
            });
        });
    });
    </script>

    
</center>

</body>
</html>