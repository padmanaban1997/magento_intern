<?php include_once('connection.php');?>

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
	<form action="" onsubmit="return validation()" name="forms" method="post">

	<center>
	<table >

		<tr>
			<td colspan="2" class="white-text" style="text-align: center;font-size:20px;">Form Validation</td>
		</tr>

		<tr>
			<td class="white-text"> 
				<label for="name"> Name:</label>
			</td>
			<td>
				<input type="text" id="name" name="name" placeholder="Enter Your Name ">
				<br><span id="username" class="error-text"></span>
			</td>
		</tr>

		<tr>
			<td class="white-text" >
				<label for="email">Email:</label>
			</td>
			<td>
				<input type="email" name="semail" id="semail" placeholder="Enter Your Email">
				<br><span id="uemail" class="error-text"></span>
			</td>
		</tr>

		<tr>
			<td class="white-text" >
				<label for="Detail">Detail:</label>
			</td>
			<td>
				<textarea name="message" rows="10" 	cols="30" id="detail" placeholder="Detail..."></textarea><br>
				<span id="udetail" class="error-text"></span>
										
			</td>
		</tr>
		<tr>
			<td class="white-text" >
				<label for="pwd">Password:</label><br>

			</td>
			<td> 
				<input type="password" placeholder="Enter Your Password" id="pwd" name="pwd">
				<br><span class="error-text" id="upwd"></span>
			</td>
		</tr>

		<tr>
			<td class="white-text" >
				<label for="cpwd"> Confirm Password:</label><br>
			</td>
			 <td> 
			 	<input type="password" placeholder="Confirm Password" id="cpwd" name="cpwd"><br>
			 	<span class="error-text" id="ucpwd"></span>
			 </td>

		</tr>

		<tr>
			<td class="white-text" > 
				<label for="age">Age:</label>
			</td>
			<td> 
				<input type="number" placeholder="age" id="age" name="age" min="1" max="100"><br>
				<span class="error-text" id="uage"></span>
			</td>

		</tr>

		<tr>
			<td class="white-text" >
				<label for="Birth Date:">Birth Date:</label>
			</td>

			<td>
				<input type="date" name="date" id="date">
				<span class="error-text" id="datevalid"></span>
			</td>

		</tr>
		


		<tr>
			<td class="white-text" >
				<label for="gender">Gender:</label>
			</td>

			<td class="white-text" > 
				<input type="radio" id="male" name="gender" value="1">
				<label for="male">Male</label>
				<input type="radio" id="female" name="gender" value="0">
				<label for="female">Female</label><br>
				<span id="ugender" class="error-text"></span>
			</td>
		</tr>

		<tr>
			<td class="white-text" >
				<label for="state">Choose a state:</label>
			</td>
			<td >
				<select id="state" name="state">
					<option value="">select a state</option>
					<option value="gujarat">Gujarat</option>
					<option value="chennai">chennai</option>
				</select><br>
				<span id="userstate" class="error-text"></span>
			</td>
		</tr>

		<tr>
			<td colspan="2" class="white-text" >
				<input type="checkbox" id="checkb" name="checkb" value="check">
			 	<label for="condition"> I accept all terms and conditions</label><br>
			 	<span id="usercheck" class="error-text"></span>
			</td>
		</tr>

		<tr>
			<td colspan="2" style="text-align: center">
				<input type="submit"  value="submit">&nbsp; &nbsp;&nbsp;<input type="reset" value="cancel">
			</td>
		</tr>

	</table>	
	</center>
	</form>


	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				if (isset($_POST["name"])&& isset($_POST["semail"])&& isset($_POST["message"])&& isset($_POST["pwd"])&& isset($_POST["age"])&& isset($_POST["date"])&& isset($_POST["gender"])&& isset($_POST["state"]))
					{ 
						$cname=$_POST["name"];
						$cemail=$_POST["semail"];
						$cdetail=$_POST["message"];
						$cpassword=$_POST["pwd"];
						$cage=$_POST["age"];
						$cdob=$_POST["date"];
						$cgender=$_POST["gender"];
						$cstate=$_POST["state"];

						if($cname!='' && $cemail!=''&& $cdetail!=''&& $cpassword!='' && $cage!='' && $cdob!='' && $cgender!='' && $cstate!='')
								{
									
									$sql = "insert into crud(name,email,detail,password,age,dob,gender,state)
									values('".$cname."','".$cemail."','".$cdetail."','".$cpassword."','".$cage."','".$cdob."','".$cgender."','".$cstate."')";
									$result=mysqli_query($conn,$sql);

									if($result)
									{
										echo "	<script>
										alert(' Sucessfully inserted !');
										window.location='index.php';
												</script>";
	
	
									}
								}
					}
				else
					{
						echo "value not set";
					}
			}
	?>




<script type="text/javascript">


         function validation(){
								var user = document.getElementById('name').value;
								var useremail=document.getElementById('semail').value;
								var userdetail=document.getElementById('detail').value;
								var upassword=document.getElementById('pwd').value;
								var confirmpassword=document.getElementById('cpwd').value;
								var userage=document.getElementById('age').value;
								var date=document.getElementById('date').value;
								
								var rd1=document.getElementsByName('gender');
							    var usercheckbox=document.getElementById('checkb').checked;	


								if(user == '')
								{

									document.getElementById('username').innerHTML="Please fill the username field";
								}

								else if((user.length<=2)|| (user.length>10))
								{

									document.getElementById('username').innerHTML="username length must be  between(2 to 10 chars)";
								}

								else if(!isNaN(user))

								{
									document.getElementById('username').innerHTML="only characters are  allowed";

								}

								else 
								{
									document.getElementById('username').innerHTML="";

								}

								if(useremail == '')
								{
									document.getElementById('uemail').innerHTML="Please fill the Email field";	
								
								}
								else 
								{
									document.getElementById('uemail').innerHTML="";

								}

								if(userdetail == '')
								{
									document.getElementById('udetail').innerHTML="Please fill the detail field";
								
								}
								else 
								{
									document.getElementById('udetail').innerHTML="";

								}
								if(upassword == '')

								{
									document.getElementById('upwd').innerHTML="Please fill the password field";	
								
								}

								else if((upassword.length<=2)|| (user.length>10))
								{

									document.getElementById('upwd').innerHTML="password length must be  between(2 to 10 chars)";
								}

								else 
								{
									document.getElementById('upwd').innerHTML="";

								}

								if(confirmpassword == '')
								{
									document.getElementById('ucpwd').innerHTML="Please fill the confirm password field";

							     }

							    else if((confirmpassword.length<=2)|| (user.length>10))
								{

									document.getElementById('ucpwd').innerHTML="confirm password length must be  between(2 to 10 chars)";

								}

								else if(upassword!=confirmpassword)
								{

									document.getElementById('ucpwd').innerHTML="password are not same !";
								}

								else 
								{
									document.getElementById('ucpwd').innerHTML="";

								}

								if(userage == '')
								{
									document.getElementById('uage').innerHTML="Please fill the age field";

								
								}

								else if(isNaN(userage))
								{


									document.getElementById('uage').innerHTML="only numbers are allowed";

								}

								else 
								{
									document.getElementById('uage').innerHTML="";

								
								}
								
								if(date == '')
								{


									document.getElementById('datevalid').innerHTML="enter a date";
								
								}
								else
								{
									document.getElementById('datevalid').innerHTML="";

								}


								if (!(rd1[0].checked || rd1[1].checked))
								{
               						document.getElementById('ugender').innerHTML="plz select a any one";
               					 
              					}
              					else if ((rd1[0].checked || rd1[1].checked))
								{
               						document.getElementById('ugender').innerHTML="";
               					 
              					}
              					if(forms.state.selectedIndex==0)

								{

									document.getElementById('userstate').innerHTML="plz select a state";
									
								}

								else 

								{
									document.getElementById('userstate').innerHTML="";
									
								}
								
								if(usercheckbox == ''|| user == '' ||useremail == ''|| userdetail == ''||upassword == ''||confirmpassword == ''||userage == ''||date == ''||month == ''||year == '')
								{

									document.getElementById('usercheck').innerHTML=" ** select a checkbox";

									return false;
								}



						}
</script>
		
</body>

</html>
