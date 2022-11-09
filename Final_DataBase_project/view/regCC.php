<?php
$NameErr = $idErr = $unwordErr = $passErr = $userErr = "" ;

$uid = ""; 
$userName= "";
$Password= "";
$user = ""; 

   include('../controller/regCheck.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>REGSTRATION PAGE</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color:rgb(246, 251, 236);">

	<form name="myform"  method="post" >
		<div id="d1">
            
			
       </div>
             <div id="d3" >
	             <div class="c2">
		

                       <center> <legend><h2>REGSTRATION</h2></legend></center> 	
					           <b>Id:</b><br/>
							   <input type="text" name="id"  value="<?php echo $uid;?>" placeholder="Enter Id">
							   <p style="color:red" id="idErr"><?php echo $idErr; ?></p>
                               <b>Username:</b><br/>
							   <input type="text" name="username"  value="<?php echo $userName;?>" placeholder="Enter Username">
							   <p style="color:red" id="unwordErr"><?php echo $unwordErr; ?></p>	
							   <b>Password:</b><br/>
                               <input type="password" name="password" id="password" value="<?php echo $Password;?>" placeholder="Enter Your Password" >
							   <p style="color:red" id="passErr"><?php echo $passErr; ?></p>				   						   
							   <b>User Type:</b><br/>
                               <input type="radio" name="usertype" id="Owner" value="Owner"><b>Owner</b><br/>
                               <input type="radio" name="usertype" id="Customer" value="Customer"><b>Customer</b><br/> 
							   <input type="radio" name="usertype" id="Doctor" value="Doctor"><b>Doctor</b><br/> 
							   <input type="radio" name="usertype" id="Employee" value="Employee"><b>Employee</b><br/>
							   <input type="radio" name="usertype" id="FoodDelar" value="FoodDelar"><b>FoodDelar</b><br/> 
							   
							   
								

							  <input type="submit" name="submit" value="Submit" style="width: 200px; display: inline-block; height: 30px"><br/>	
							  Back to <a href="login.html">Login</a> Page

                              
							
				 </div>
			 </div>
			 
	     
	</form>




</body>
</html>


